<?php

namespace App\Http\Controllers\Pfes;

use App\Exports\PfasExport;
use App\Exports\PfesExport;
use App\Interfaces\IPfe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


class PfeController extends Controller
{
    protected $pfes;

    public function __construct(IPfe $pfes)
    {
        $this->pfes = $pfes;
    }


    public function index()
    {
        return $this->pfes->index();
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
        return $this->pfes->store($request);
    }


    public function show($id)
    {
        return $this->pfes->show($id);
    }


    public function edit($id)
    {

    }

    public function update(Request $request)
    {
        return $this->pfes->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->pfes->destroy($request);
    }

    public function DownloadFile($titre, $filename)
    {

        return $this->pfes->DownloadFile($titre, $filename);
    }

    public function export()
    {

        return Excel::download(new PfesExport, 'pfes.xlsx');
    }




}


?>
