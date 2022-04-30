<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapportPfe extends Model
{
    protected $fillable=['file_name','pfe_id'];

    protected $table = 'rapport_pfes';



}
