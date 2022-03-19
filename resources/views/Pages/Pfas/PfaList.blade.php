@extends('layouts.master')
@section('css')

@section('title')
    Liste des Pfa
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">La liste des projets de fin d'année</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

    <!-- main body -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="button x-small m-2" >Ajouter Pfa</button>
                    <br/>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Spécialite</th>
                                <th>Réalisé Par</th>
                                <th>Encadré Par </th>
                                <th>Mots Clé</th>
                                <th>Résumé</th>
                                <th>Opération</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $i=0;
                            ?>
                            @foreach($pfas as $pfa)
                                <?php $i++;  ?>
                                <td>{{$pfa->Titre}}</td>
                                <td>{{$pfa->Specialite}}</td>
                                <td>{{$pfa->Realise_par}}</td>
                                <td>{{$pfa->Encadre_par}}</td>
                                <td>{{$pfa->Mots_cle}}</td>
                                <td>
                                    <a href="#" type="button" class="btn btn-warning btn-sm">Résumé</a>
                                </td>
                                <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                             data-target="#edit{{ $pfa->id }}"
                                             title="Editer"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{$pfa->id }}"
                                            title="Supprimer"><i
                                            class="fa fa-trash"></i></button></td>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection
