<?php

namespace App\Http\Controllers;

use App\MemoiresView;
use App\Models\Pfa;
use App\Models\Pfe;
use App\Models\Rapport;
use App\Models\RapportPfe;
use App\Models\RapportStage;
use App\Models\Stage;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;

class RechercheStudent extends Controller
{


    public function store(Request $request)
    {
        $fl = Rapport::all();
        $fl2 = RapportStage::all();
        $fl3 = RapportPfe::all();

        if ($request->ch1 && $request->ch2 && $request->ch3) {
            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->get();

            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));

        } elseif ($request->ch1 && $request->ch2) {
            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->Where('Type', '!=', "Pfe")
                ->get();

            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));

        } elseif ($request->ch1 && $request->ch3) {
            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->Where('Type', '!=', "Stage")
                ->get();
            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));

        } elseif ($request->ch2 && $request->ch3) {
            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->Where('Type', '!=', "Pfa")
                ->get();

            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));

        } elseif ($request->ch1) {

            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->Where('Type', 'like', "Pfa")
                ->get();

            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));
        } elseif ($request->ch2) {
            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->Where('Type', 'like', "Stage")
                ->get();
            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));
        } elseif ($request->ch3) {
            $pfa = MemoiresView::where('Titre', 'like', "%{$request->Titre}%")
                ->Where('Specialite', 'like', "%{$request->Specialite}%")
                ->Where('Realise_par', 'like', "%{$request->Realise_par}%")
                ->Where('Encadre_par', 'like', "%{$request->Encadre_par}%")
                ->Where('Mots_cle', 'like', "%{$request->Mots_cle}%")
                ->Where('Type', 'like', "Pfe")
                ->get();

            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));
        } else {
            $pfa = MemoiresView::latest()->take(5)->get();
            return view('Pages.Students.dashboard', compact('pfa', 'fl', 'fl2', 'fl3'));
        }


    }
    //
}
