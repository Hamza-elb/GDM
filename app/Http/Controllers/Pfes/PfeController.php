<?php

namespace App\Http\Controllers\Pfes;

use App\Interfaces\IPfe;
use App\Models\Pfa;
use App\Models\Pfe;
use App\Models\RapportPfe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PfeController extends Controller
{
    protected $pfes;

    public function __construct(IPfe $pfes){
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

  public function DownloadFile($titre,$filename){

      return $this->pfes->DownloadFile($titre,$filename);
  }

}


?>
