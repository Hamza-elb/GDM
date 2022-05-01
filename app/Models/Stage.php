<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{

    protected $fillable = ['Titre','Specialite','Realise_par','Encadre_par','Mots_cle','Resume'];
    protected $table = 'stages';
    public $timestamps = true;

}
