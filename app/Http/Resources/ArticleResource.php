<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource{
    /**
     * Transform the resource into an array.
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request){
        $category = $this->category;
        $user = $this->user;
        $author = $user->edutiant->nom;
        $createdAt = $this->created_at->format('Y-m-d');
        $updatedAt = $this->updated_at->format('Y-m-d');

        return [
            'id' => $this->id,
            'titre' => isset($this->titre[app()->getLocale()]) ? $this->titre[app()->getLocale()] : $this->titre['en'],
            'contenu' => isset($this->contenu[app()->getLocale()]) ? $this->contenu[app()->getLocale()] : $this->contenu['en'],
            "category" => isset($category->category[app()->getLocale()]) ? $category->category[app()->getLocale()] : $category->category['en'],
            "author" => $author,
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
            'file_path' => $this->file_path,
            'user_id' => $this->user_id,
        ];
    }
}
