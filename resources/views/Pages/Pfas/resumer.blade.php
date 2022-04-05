@extends('layouts.master')
@section('css')

@section('title')
    Résumé
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> Résumé de {{$pfa->Titre}} </h4>
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
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body m-2">

                <h2 style="text-align: center"> Sujet : <br>

                    {{$pfa->Titre}}
                </h2>

                <br><br><br><br><br><br>

                <h3 style="display: inline">
                    Présenté par :

                    {{$pfa->Realise_par}}
                </h3>


                <h3 style="float: right;display: inline">
                    Encadré par :

                    {{$pfa->Encadre_par}}

                 </h3>

                <br>
                <br>
                <br>
                <h2 style="text-align: center"> Résumé : <br>  </h2>
                <br>
                <br>

                  <h6>{{$pfa->Resume}}</h6>
                <br>
                <br>
                <br><br>
                <br>
                <br>

                <h4 >
                    Mots clès : </h4>
               <h6> {{$pfa->Mots_cle}}</h6>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
