<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pfe extends Model
{

    protected $fillable = ['Titre','Specialite','Realise_par','Encadre_par','Mots_cle','Resume'];
    protected $table = 'pfes';
    public $timestamps = true;



}
