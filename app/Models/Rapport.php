<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapport extends Model
{
    protected $fillable=['file_name','pfa_id'];

    protected $table = 'rapports';


}
