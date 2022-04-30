<?php

namespace App\Http\Controllers\Pfes;

use App\Models\Pfa;
use App\Models\Pfe;
use App\Models\RapportPfe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class PfeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

      $pfes = Pfe::all();
     $fl = RapportPfe::all();
      //dd($fl);

      return view('Pages.Pfes.Pfes',compact('pfes','fl'));
  }



   /* public function afficherOne($id)
    {

        $pfe = Pfe::find($id);
        return view('Pages.Pfes.resumer', compact('pfe'));

    }*/

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
      try {
          $pfes = new Pfe();

          $pfes->Titre = ucfirst($request->Titre);
          $pfes->Specialite = ucwords($request->Specialite);
          $pfes->Realise_par = ucwords($request->Realise_par);
          $pfes->Encadre_par = ucwords($request->Encadre_par);
          $pfes->Mots_cle =ucwords( implode(" ",multiexplode(array(",",".","|",":","-"," ",";") ,$request->Mots_cle)));
          $pfes->Resume = $request->Resume;


          $pfes->save();

          $fileName =null;
          if($request->hasFile('files')){
              $titre = $request->Titre;
              $pdfFile = $request->file('files');
              $fileName = $pdfFile->getClientOriginalName();
              Storage::putFileAs('public/PFE/'.$titre,$pdfFile, $fileName);
          }

          RapportPfe::create([
              'file_name' => $fileName,
              'pfe_id' => Pfe::latest()->first()->id,

          ]);

          toastr()->success('Les données ont été enregistrées avec succès');

          return redirect()->route('Pfe.index');


      }catch (\Exception $e){
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
      $pfe = Pfe::find($id);
      return view('Pages.Pfes.resumer', compact('pfe'));
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

          $pfes=Pfe::findOrFail($request->id);
          $pfes->update([
              $pfes->Titre = ucfirst($request->Titre),
              $pfes->Specialite = ucwords($request->Specialite),
              $pfes->Realise_par = ucwords($request->Realise_par),
              $pfes->Encadre_par = ucwords($request->Encadre_par),
              $pfes->Mots_cle =ucwords( implode(" ",multiexplode(array(",",".","|",":","-"," ",";") ,$request->Mots_cle))),
              $pfes->Resume = $request->Resume
          ]);

          toastr()->success('Les données ont été modifiées avec succès');

          return redirect()->route('Pfe.index');


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
       // Storage::disk('upload')->delete('storage/PFE/'.$request->Titre);


      $pfes=Pfe::findOrFail($request->id)->delete();
      toastr()->error('Les données ont été supprimées avec succès');

      return redirect()->route('Pfe.index');

  }

  public function DownloadFile($titre,$filename){

     return response()->download(public_path('storage/PFE/'.$titre.'/'.$filename));
  }

}

// Code de sépération
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

?>
