<?php

namespace App\Http\Controllers;

use App\Models\Pfa;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pfa = Pfa::all();

        return view('Pages.Recherche',compact('pfa'));
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

        $pfa=Pfa::where('Titre','like',"%{$request->Titre}%")
            ->orWhere('Specialite','like',"%{$request->Specialite}%")
            ->orWhere('Realise_par','like',"%{$request->Realise_par}%")
            ->orWhere('Encadre_par	','like',"%{$request->Encadre_par}%")
            ->orWhere('Mots_cle	','like',"%{$request->Mots_cle}%")
            ->get();
        return redirect()->route('Pfa.index')->with('pfa',$pfa);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
