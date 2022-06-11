<?php

namespace App\Exports;

use App\Models\Pfe;
use Maatwebsite\Excel\Concerns\FromCollection;

class PfesExport implements FromCollection
{

    public function collection()
    {
        return Pfe::all();
    }
}
