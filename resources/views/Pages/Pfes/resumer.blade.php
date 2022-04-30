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
            <h4 class="mb-0"> Résumé de {{$pfe->Titre}} </h4>
        </div>
<br><br>
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

                <p style="text-align: center;font-size: x-large; font-family: Georgia, serif;"> <b style="color: #011F26">Sujet : </b> <br>

                   <i style="color: #026873"> {{$pfe->Titre}}</i>
                </p>

                <br><br><br><br><br><br>

                <p style="display: inline;font-size: large;font-family: Gill Sans, sans-serif;">
                    <b style="color: #011F26">Présenté par : </b>

                    <span style="color: #011F26">{{$pfe->Realise_par}}</span>
                </p>


                <p style="display: inline;float: right;display: inline;font-size: large;font-family: Gill Sans, sans-serif;">

                    <b style="color: #011F26">Encadré par :</b>

                    <span style="color: #011F26"> {{$pfe->Encadre_par}}</span>

                 </p>

                <br>
                <br>
                <br>
                <p style="text-align: center;font-size: x-large; font-family: Georgia, serif;">
                    <b style="color: #026873">Résumé :</b> <br>  </p>
                <br>
                <br>

                  <h6 style="font: 1.2em; font-family:  Fira Sans, sans-serif;">{{$pfe->Resume}}</h6>
                <br>
                <br>
                <br><br>
                <br>
                <br>

                <p style="font-size: large;font-family: Gill Sans, sans-serif; " >
                   <b style="color: #011F26 "> Mots clès : </b>

                </p>
               <h6  style="color: #026873""> {{$pfe->Mots_cle}}</h6>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
