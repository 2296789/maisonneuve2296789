<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Edutiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select()
        ->join('edutiants', 'edutiants.id', 'edutiant_id')
        ->orderBy('edutiants.nom')
        ->paginate(3);
        
        return view('user.index', compact('users')); 
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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

        $edutiant = Edutiant::where('email', $request->email)
                    ->first();
                    
        if ($edutiant) {
            $user = new User;
            $user->edutiant_id = $edutiant->id;
            $user->fill($request->all());
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect(route('user.index'))->withSuccess('User created successfully!');
        } else {
            return redirect()->back()->withErrors('Student not found.');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function login(Request $request)
    {    
        $user = Auth::user();
        
        $edutiant = Edutiant::where('user_id', $user->id)->first();
        $user->edutiant()->associate($edutiant);
        $user->save();
    }
}
