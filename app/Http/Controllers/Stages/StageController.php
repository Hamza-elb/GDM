<?php

namespace App\Http\Controllers\Stages;

use App\Exports\StagesExport;
use App\Models\RapportStage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use function App\Http\Controllers\Pfas\multiexplode;


class StageController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()

  {
      $stages=Stage::all();
      $fl = RapportStage ::all();
      return view('Pages.Stages.Stages',compact('stages','fl'));

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
        DB::beginTransaction();

        try {
            $stage = new Stage();

            $stage->Titre = ucfirst($request->Titre);
            $stage->Specialite = ucwords($request->Specialite);
            $stage->Realise_par = ucwords($request->Realise_par);
            $stage->Encadre_par = ucwords($request->Encadre_par);
            $stage->Mots_cle =ucwords( implode(" ",multiexplode1(array(",",".","|",":","-"," ",";") ,$request->Mots_cle)));
            $stage->Resume = $request->Resume;
            $stage->save();

            $fileName =null;
            if($request->hasFile('files')){
                $titre = $request->Titre;
                $pdfFile = $request->file('files');
                $fileName = $pdfFile->getClientOriginalName();
                Storage::putFileAs('public/Stage/'.$titre,$pdfFile, $fileName);
            }

            RapportStage::create([
                'file_name' => $fileName,
                'stage_id' => Stage::latest()->first()->id,

            ]);
            DB::commit(); // insert data

            toastr()->success('Les données ont été enregistrées avec succès');

            return redirect()->route('Stage.index');


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
      $stage=Stage::find($id);;
      return view('Pages.Stages.resumer', compact('stage'));

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

            $stage=Stage::findOrFail($request->id);
            $stage->update([
                $stage->Titre = ucfirst($request->Titre),
                $stage->Specialite = ucwords($request->Specialite),
                $stage->Realise_par = ucwords($request->Realise_par),
                $stage->Encadre_par = ucwords($request->Encadre_par),
                $stage->Mots_cle =ucwords( implode(" ",multiexplode1(array(",",".","|",":","-"," ",";") ,$request->Mots_cle))),
                $stage->Resume = $request->Resume
            ]);

            toastr()->success('Les données ont été modifiées avec succès');

            return redirect()->route('Stage.index');


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
      $filename = Stage::findOrFail($request->id);

      $path = 'Stage/'.$filename->Titre;
      Storage:: disk('public')->deleteDirectory($path);


      $stage=Stage::findOrFail($request->id)->delete();
      toastr()->error('Les données ont été supprimées avec succès');

      return redirect()->route('Stage.index');

  }


    public function DownloadFile($titre,$filename){

        return response()->download(storage_path('app/public/Stage/'.$titre.'/'.$filename));
    }

    public function export()
    {

        return Excel::download(new StagesExport, 'stages.xlsx');
    }


}
function multiexplode1 ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

?>
