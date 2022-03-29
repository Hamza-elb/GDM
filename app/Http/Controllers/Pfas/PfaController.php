<?php

namespace App\Http\Controllers\Pfas;

use App\Http\Requests\StorePfas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pfa;

class PfaController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $pfas = Pfa::all();
    return view('Pages.Pfas.PfaList', compact('pfas'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      //$validated = $request->validated();

      $pfas = new Pfa();

      $pfas->Titre = $request->Titre;
      $pfas->Specialite = $request->Specialite;
      $pfas->Realise_par = $request->Realise_par;
      $pfas->Encadre_par = $request->Encadre_par;
      $pfas->Mots_cle = $request->Mots_cle;
      $pfas->Resume = $request->Resume;

      $pfas->save();


  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
