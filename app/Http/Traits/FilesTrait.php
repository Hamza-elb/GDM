<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait FilesTrait
{

//    public function uploadfile($request,$files){
//
//        if($request->hasFile($files)){
//            $titre = $request->Titre;
//            $pdfFile = $request->file($files);
//            $fileName = $pdfFile->getClientOriginalName();
//            Storage::putFileAs('public/PFE/'.$titre,$pdfFile, $fileName);
//        }
//    }



    public function deletefile($name){

        $exists = Storage::disk('public')->exists('PFE/'.$name);

        if ($exists){
            Storage:: disk('public')->deleteDirectory('PFE/'.$name);
        }
    }
}
