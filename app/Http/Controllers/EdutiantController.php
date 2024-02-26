<?php

namespace App\Http\Controllers;

use App\Models\Edutiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EdutiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edutiants = Edutiant::all();
        // $edutiants = Edutiant::select()
        // ->join('vills', 'villes.id', 'ville_id')
        // ->get();

        return view('edutiant.index', ["edutiants" => $edutiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('edutiant.create', ["villes" => $villes]);
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
            'nom' => 'required|max:191',
            'email' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
            'date_naissance' => 'required|date',
            'ville_id' => 'required'
        ]);

        $edutiant = Edutiant::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id
        ]);

        return  redirect()->route('edutiant.show', $edutiant->id)
        ->with('success', 'Edutiant created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edutiant  $edutiant
     * @return \Illuminate\Http\Response
     */
    public function show(Edutiant $edutiant)
    {
        $edutiants = Edutiant::all();
        return view('edutiant.show', ["edutiant" => $edutiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edutiant  $edutiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Edutiant $edutiant)
    {
        $villes = Ville::all();
        return view('edutiant.edit', ["villes" => $villes, 'edutiant' => $edutiant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edutiant  $edutiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edutiant $edutiant)
    {
        $request->validate([
            'nom' => 'required|max:191',
            'email' => 'required|string',
            'adresse' => 'required|string',
            'telephone' => 'nullable|string',
            'date_naissance' => 'nullable|date',
            'ville_id' => 'required'
        ]);

        $edutiant ->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'date_naissance' => $request->date_naissance,
            'ville_id' => $request->ville_id
        ]);

        return  redirect()->route('edutiant.show', $edutiant->id)->with('success', 'Edutiant created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edutiant  $edutiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edutiant $edutiant)
    {
        $edutiant->delete();
        return redirect()->route('edutiant.index')->with('success', 'Edutiant deleted successfully!');
    }
}