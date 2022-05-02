<?php

namespace App\Http\Controllers\Pfas;

use App\Http\Requests\StorePfas;
use App\Models\Rapport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pfa;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
      $fl = Rapport::all();
    return view('Pages.Pfas.PfaList', compact('pfas','fl'));
  }


//  public function afficherOne($id)
//  {
//
//        $pfa = Pfa::find($id);
//      return view('Pages.Pfas.resumer', compact('pfa'));
//
//  }

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
     * @param Request $request
     * @param $pdfs
     * @return Response
     */
  public function store(Request $request)
  {
      DB::beginTransaction();

      try {
          $pfas = new Pfa();

          $pfas->Titre = ucfirst($request->Titre);
          $pfas->Specialite = ucwords($request->Specialite);
          $pfas->Realise_par = ucwords($request->Realise_par);
          $pfas->Encadre_par = ucwords($request->Encadre_par);
          $pfas->Mots_cle =ucwords( implode(" ",multiexplode(array(",",".","|",":","-"," ",";") ,$request->Mots_cle)));
          $pfas->Resume = $request->Resume;
          $pfas->save();

            $fileName =null;
            if($request->hasFile('files')){
                $titre = $request->Titre;
                $pdfFile = $request->file('files');
                $fileName = $pdfFile->getClientOriginalName();
                Storage::putFileAs('public/PFA/'.$titre,$pdfFile, $fileName);
            }

            Rapport::create([
                'file_name' => $fileName,
                 'pfa_id' => Pfa::latest()->first()->id,

            ]);
          DB::commit(); // insert data

          toastr()->success('Les données ont été enregistrées avec succès');

          return redirect()->route('Pfa.index');


      }catch (\Exception $e){
          DB::rollback();
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }




  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $pfa = Pfa::find($id);
      return view('Pages.Pfas.resumer', compact('pfa'));
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
  public function update(Request $request)
  {
      try {

          $pfas=Pfa::findOrFail($request->id);
          $pfas->update([
              $pfas->Titre = ucfirst($request->Titre),
          $pfas->Specialite = ucwords($request->Specialite),
          $pfas->Realise_par = ucwords($request->Realise_par),
          $pfas->Encadre_par = ucwords($request->Encadre_par),
          $pfas->Mots_cle =ucwords( implode(" ",multiexplode(array(",",".","|",":","-"," ",";") ,$request->Mots_cle))),
          $pfas->Resume = $request->Resume
          ]);

          toastr()->success('Les données ont été modifiées avec succès');

          return redirect()->route('Pfa.index');


      }catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      $filename = Pfa::findOrFail($request->id);
      $path = 'PFA/'.$filename->Titre;
      Storage:: disk('public')->deleteDirectory($path);


      $pfas=Pfa::findOrFail($request->id)->delete();
      toastr()->error('Les données ont été supprimées avec succès');

      return redirect()->route('Pfa.index');

  }

    public function DownloadFile($titre,$filename){

        return response()->download(storage_path('app/public/PFA/'.$titre.'/'.$filename));
    }

}

// Code de sépération
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


?>
