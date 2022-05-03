<?php

namespace App\Interfaces;

use App\Http\Traits\FilesTrait;
use App\Models\Pfe;
use App\Models\RapportPfe;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function App\Http\Controllers\Pfes\multiexplode;

class PfeImp implements IPfe
{
    use FilesTrait;

    public function index()
    {
        $pfes = Pfe::all();
        $fl = RapportPfe::all();
        //dd($fl);

        return view('Pages.Pfes.Pfes',compact('pfes','fl'));
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $pfes = new Pfe();

            $pfes->Titre = ucfirst($request->Titre);
            $pfes->Specialite = ucwords($request->Specialite);
            $pfes->Realise_par = ucwords($request->Realise_par);
            $pfes->Encadre_par = ucwords($request->Encadre_par);
            $pfes->Mots_cle =ucwords( implode(" ", $this->multiexplode(array(",", ".", "|", ":", "-", " ", ";"), $request->Mots_cle)));
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

            DB::commit(); // insert data

            toastr()->success('Les données ont été enregistrées avec succès');

            return redirect()->route('Pfe.index');


        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function show($id)
    {
        $pfe = Pfe::find($id);
        return view('Pages.Pfes.resumer', compact('pfe'));
    }

    public function update($request)
    {
        try {

            $pfes=Pfe::findOrFail($request->id);

            $pfes->update([
                $pfes->Titre = ucfirst($request->Titre),
                $pfes->Specialite = ucwords($request->Specialite),
                $pfes->Realise_par = ucwords($request->Realise_par),
                $pfes->Encadre_par = ucwords($request->Encadre_par),
                $pfes->Mots_cle =ucwords( implode(" ",$this->multiexplode(array(",",".","|",":","-"," ",";") ,$request->Mots_cle))),
                $pfes->Resume = $request->Resume
            ]);




            toastr()->success('Les données ont été modifiées avec succès');

            return redirect()->route('Pfe.index');


        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function destroy($request)
    {
        $filename = Pfe::findOrFail($request->id);

//     $path = Storage::files('public');
//

        //dd($filename->Titre);

        // Storage::disk('upload')->deleteDirectory('/'.$request->Titre);
       // $path = 'PFE/'.$filename->Titre;
      //  Storage:: disk('public')->deleteDirectory($path);

        $this->deletefile($filename->Titre);

        $pfes=Pfe::findOrFail($request->id)->delete();

        toastr()->error('Les données ont été supprimées avec succès');

        return redirect()->route('Pfe.index');
    }

    public function DownloadFile($titre, $filename)
    {
        return response()->download(storage_path('app/public/PFE/'.$titre.'/'.$filename));
    }

    private function multiexplode($delimiters,$string)
    {
        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }


}
