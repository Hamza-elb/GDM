<?php

namespace App\Exports;

use App\Models\Pfa;
use Maatwebsite\Excel\Concerns\FromCollection;

class PfasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pfa::all();
    }
}
