<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RapportStage extends Model
{
    protected $fillable=['file_name','stage_id'];

    protected $table = 'rapport_stages';

}
