<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $articles = Article::select('articles.*')
                    //index中有多个id，这里要获取article的id
                    ->join('users', 'users.id', 'user_id')
                    ->join('edutiants', 'edutiants.id', 'edutiant_id')
                    ->orderBy('titre')
                    ->paginate(10);

        $articles = ArticleResource::collection($articles);
        $data = json_encode($articles);
        $articles = json_decode($data, true);

        // return $articles;
        return view('article.index', compact("articles"));
     }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $user_id = Auth::id();
        $categories = Category::categories();    

        return view('article.create', compact('categories', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'titre_en' => 'required|max:191',
            'contenu_en' => 'required|max:2000|string',
            'titre_fr' => 'max:191',
            'contenu_fr' => 'max:2000',
            'category_id' => 'exists:categories,id',
        ]);

        $articleTitre = [
            'en' => $request->titre_en
        ];

        if($request->titre_fr != null) {
            $articleTitre['fr'] = $request->titre_fr;
        }

        $articleContenu = [
            'en' => $request->contenu_en
        ];

        if($request->contenu_fr != null) {
            $articleContenu['fr'] = $request->contenu_fr;
        }
        $article = Article::create([
            'titre' => $articleTitre,
            'contenu' => $articleContenu,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);
  
        if ($request->hasFile('file')) {
            $request->validate([
                    'file' => 'nullable|mimes:zip,pdf,doc,docx|max:1024', // 最大1MB
                ]);
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);
            $article->file_path = $filename;
            $article->save();
        }

        return redirect()->route('article.show', $article->id)->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($article){
        $article = ArticleResource::collection(Article::select()->where('id', $article)->get());
        $data = json_encode($article);
        $article = json_decode($data, true);
        $article = $article[0];
        $user_id = Auth::id();
        
        // return $article;
        return view('article.show', compact('article', 'user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article){
        $user_id = Auth::id();
        $categories = Category::all();
        //return $categories;
        return view('article.edit', compact('article', 'categories', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article){
        $request->validate([
            'titre_en' => 'required|max:191',
            'contenu_en' => 'required|string',
            'titre_fr' => 'max:191',
            'contenu_fr' => 'string',
            'category_id' => 'exists:categories,id',
        ]);

        $articleTitre = [
            'en' => $request->titre_en
        ];

        if($request->titre_fr != null) {
            $articleTitre['fr'] = $request->titre_fr;
        }

        $articleContenu = [
            'en' => $request->contenu_en
        ];

        if($request->contenu_fr != null) {
            $articleContenu['fr'] = $request->contenu_fr;
        }

        $article->update([
            'titre' => $articleTitre,
            'contenu' => $articleContenu,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/uploads', $filename);
            $article->file_path = $filename;
            $article->save();
        }
 
        return redirect()->route('article.show', $article->id)->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully!');
     }

     public function pdf($article){
        $article = ArticleResource::collection(Article::select()->where('id', $article)->get());
        $data = json_encode($article);
        $article = json_decode($data, true);
        $article = $article[0];

        $qrCode = QrCode::size(200)->generate(route('article.show', $article['id']));
        $pdf = new Dompdf();
        $pdf->loadHtml(view('article.article-pdf', ['article' =>$article, 'qrCode' => $qrCode]));
        $pdf->render();

        return $pdf->stream('article_'.$article['id'].'.pdf');
    }
}
