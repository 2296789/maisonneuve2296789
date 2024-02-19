<?php

namespace App\Http\Controllers;

use App\Models\Edutiant;
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
        return view('edutiant.index', ["edutiants" => $edutiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edutiant  $edutiant
     * @return \Illuminate\Http\Response
     */
    public function show(Edutiant $edutiant)
    {
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edutiant  $edutiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edutiant $edutiant)
    {
        //
    }
}
