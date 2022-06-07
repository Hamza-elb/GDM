<?php

namespace App\Http\Controllers;

use App\Models\Pfa;
use App\Models\Pfe;
use App\Models\Stage;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

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
        $pfa=Search::add(Pfa::where('Titre','like',"%{$request->Titre}%")
                ->Where('Specialite','like',"%{$request->Specialite}%")
                ->Where('Realise_par','like',"%{$request->Realise_par}%")
                ->Where('Encadre_par','like',"%{$request->Encadre_par}%")
                ->Where('Mots_cle','like',"%{$request->Mots_cle}%"))
            ->add(Pfe::where('Titre','like',"%{$request->Titre}%")
                ->Where('Specialite','like',"%{$request->Specialite}%")
                ->Where('Realise_par','like',"%{$request->Realise_par}%")
                ->Where('Encadre_par','like',"%{$request->Encadre_par}%")
                ->Where('Mots_cle','like',"%{$request->Mots_cle}%"))
            ->add(Pfe::where('Titre','like',"%{$request->Titre}%")
                ->Where('Specialite','like',"%{$request->Specialite}%")
                ->Where('Realise_par','like',"%{$request->Realise_par}%")
                ->Where('Encadre_par','like',"%{$request->Encadre_par}%")
                ->Where('Mots_cle','like',"%{$request->Mots_cle}%"))
            ->search();
/*if($request->ch1){

        $pfa=Pfa::where('Titre','like',"%{$request->Titre}%")
            ->Where('Specialite','like',"%{$request->Specialite}%")
            ->Where('Realise_par','like',"%{$request->Realise_par}%")
            ->Where('Encadre_par','like',"%{$request->Encadre_par}%")
            ->Where('Mots_cle','like',"%{$request->Mots_cle}%")
            ->get();

        //return view('Pages.Recherche',compact('pfa'));
    }
if($request->ch2){
            $pfe=Pfe::where('Titre','like',"%{$request->Titre}%")
                ->Where('Specialite','like',"%{$request->Specialite}%")
                ->Where('Realise_par','like',"%{$request->Realise_par}%")
                ->Where('Encadre_par','like',"%{$request->Encadre_par}%")
                ->Where('Mots_cle','like',"%{$request->Mots_cle}%")
                ->get();

            //return view('Pages.Recherche',compact('pfe'));
    }
if($request->ch3){
            $stage=Stage::where('Titre','like',"%{$request->Titre}%")
                ->Where('Specialite','like',"%{$request->Specialite}%")
                ->Where('Realise_par','like',"%{$request->Realise_par}%")
                ->Where('Encadre_par','like',"%{$request->Encadre_par}%")
                ->Where('Mots_cle','like',"%{$request->Mots_cle}%")
                ->get();

            //return view('Pages.Recherche',compact('stage'));
            }
        return view('Pages.Recherche',compact('stage','pfa','pfe'));
*/
        return view('Pages.Recherche',compact('pfa'));

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
