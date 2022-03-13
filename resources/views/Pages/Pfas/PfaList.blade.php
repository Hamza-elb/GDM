@extends('layouts.master')
@section('css')

@section('title')
    {{trans('main_trans.ListPfa')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{trans('main_trans.ListPfa')}}</h4>
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
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
                                <th>{{trans('main_trans.Titre')}}</th>
                                <th>{{trans('main_trans.Specialite')}}</th>
                                <th>{{trans('main_trans.RealisePar')}}</th>
                                <th>{{trans('main_trans.Encadrant')}}</th>
                                <th>{{trans('main_trans.MotsCle')}}</th>
                                <th>{{trans('main_trans.Resume')}}</th>
                                <th>{{trans('main_trans.Operation')}}</th>
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
                                    <a href="#" type="button" class="btn btn-warning btn-sm">{{trans('main_trans.Resume')}}</a>
                                </td>
                                <td> <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                             data-target="#edit{{ $pfa->id }}"
                                             title="{{ trans('main_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{$pfa->id }}"
                                            title="{{ trans('main_trans.Delete') }}"><i
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
