<?php

namespace App\Http\Controllers;
use App\Models\Edutiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'min:6|max:20'
        ]);

        $email = $request->input('email');
        $edutiant = Edutiant::where('email', $email)->first();

        if (!$edutiant) {
            return redirect(route('login'))
                ->withErrors(trans('auth.invalid_email'))
                ->withInput();
        }
        $credentials = $request->only('edutiant_id', 'password');
        $credentials['edutiant_id'] = $edutiant->id; 

        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                    ->withErrors(trans('auth.password'))
                    ->withInput();
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        // dd($user);
        return redirect()->intended(route('article.index'))->withSuccess('Sign in');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
