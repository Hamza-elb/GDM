<?php

namespace App\Interfaces;

interface IPfe{

    public function index();

    public function create();

    public function store($request);

    public function show($id);

    public function update($request);

    public function destroy($request);

    public function  DownloadFile($titre,$filename);



}
