<!DOCTYPE html>
<html lang="en">
@section('title')
    Dashboard
@stop
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    @include('layouts.head')
</head>

<body style="font-family: 'Cairo', sans-serif">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
preloader -->

@include('layouts.main-header')

@include('layouts.main-sidebar')

<!--=================================
 Main content -->
    <!-- main-content -->
    <div class="content-wrapper">
        <div class="page-title display-inline">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif;display:inline-block;">Bienvenu {{auth()->user()->name}}</h4>

                    <button type="button" class="button x-small mb-2  float-right" data-toggle="modal"
                            data-target="#recherche">
                        Rechecher
                    </button>
                </div>

                <br>
                <br>
                <div class="col-sm-6">
                    <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                    </ol>
                </div>
            </div>


        </div>


        <!-- widgets -->
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                   <span class="text-success">
                                        <i class="fas fa-light fa-diploma highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Pfa</p>
                                <h4>{{App\Models\Pfa::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">


                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-solid fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Pfe</p>
                                <h4>{{App\Models\Pfe::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-solid fa-brackets-curly highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Stage</p>
                                <h4>{{App\Models\Stage::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-solid fa-file-pdf highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Total Mémoire</p>
                                <h4>{{App\Models\Pfa::count() + App\Models\Pfe::count() + App\Models\Stage::count() }}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Status widgets-->
        @if($pfa==null)
        <div class="row">
            <div style="height: 400px;" class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="tab nav-border" style="position: relative;">
                            <div class="d-block d-md-flex justify-content-between">
                                <div class="d-block w-100">
                                    <h5 style="font-family: 'Cairo', sans-serif" class="card-title">
                                        Les dernières opérations sur le système</h5>
                                </div>
                                <div class="d-block d-md-flex nav-tabs-custom">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                               href="#students" role="tab" aria-controls="students"
                                               aria-selected="true">Pfa</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                               role="tab" aria-controls="teachers" aria-selected="false">Pfe
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                               role="tab" aria-controls="parents" aria-selected="false">Stage
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                {{--Pfa Table--}}
                                <div class="tab-pane fade active show" id="students" role="tabpanel"
                                     aria-labelledby="students-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                               class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>Titre</th>
                                                <th>Specialite</th>
                                                <th>Realise_par</th>
                                                <th>Encadre_par</th>
                                                <th>Mots Clé</th>
                                                <th>created_at</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\Pfa::latest()->take(5)->get() as $pfa)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$pfa->Titre}}</td>
                                                    <td>{{$pfa->Specialite}}</td>
                                                    <td>{{$pfa->Realise_par}}</td>
                                                    <td>{{$pfa->Encadre_par}}</td>
                                                    <td>{{$pfa->Mots_cle}}</td>
                                                    <td class="text-success">{{$pfa->created_at}}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">Il n'y a pas de données
                                                        </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{--Pfe Table--}}
                                <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                               class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>Titre</th>
                                                <th>Specialite</th>
                                                <th>Realise_par</th>
                                                <th>Encadre_par</th>
                                                <th>Mots Clé</th>
                                                <th>created_at</th>
                                            </tr>
                                            </thead>

                                            @forelse(\App\Models\Pfe::latest()->take(5)->get() as $pfe)
                                                <tbody>
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$pfe->Titre}}</td>
                                                    <td>{{$pfe->Specialite}}</td>
                                                    <td>{{$pfe->Realise_par}}</td>
                                                    <td>{{$pfe->Encadre_par}}</td>
                                                    <td>{{$pfe->Mots_cle}}</td>
                                                    <td class="text-success">{{$pfe->created_at}}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">Il n'y a pas de données
                                                        </td>
                                                </tr>
                                                </tbody>
                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                                {{--parents Table--}}
                                <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center"
                                               class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr class="table-info text-danger">
                                                <th>#</th>
                                                <th>Titre</th>
                                                <th>Specialite</th>
                                                <th>Realise_par</th>
                                                <th>Encadre_par</th>
                                                <th>Mots Clé</th>
                                                <th>created_at</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse(\App\Models\Stage::latest()->take(5)->get() as $stage)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$stage->Titre}}</td>
                                                    <td>{{$stage->Specialite}}</td>
                                                    <td>{{$stage->Realise_par}}</td>
                                                    <td>{{$stage->Encadre_par}}</td>
                                                    <td>{{$stage->Mots_cle}}</td>
                                                    <td class="text-success">{{$stage->created_at}}</td>
                                                    @empty
                                                        <td class="alert-danger" colspan="8">Il n'y a pas de données
                                                        </td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        <!-- search -->
                                        <form action="{{route('search.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <label for="Pfa" >PFA
                                                        :</label>
                                                    <input id="pfa" type="checkbox" name="ch1"  checked >
                                                </div>
                                                <div class="col">
                                                    <label for="Stage" >Stage
                                                        :</label>
                                                    <input type="checkbox"  name="ch2" checked>
                                                </div>
                                                <div class="col">
                                                    <label for="Pfe" >PFE
                                                        :</label>
                                                    <input id="pfe" type="checkbox" name="ch3"  checked>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="titre" >Titre
                                                        :</label>
                                                    <input id="titre" type="text" name="Titre" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="spécialité" class="mr-sm-2">Spécialité
                                                        :</label>
                                                    <input type="text" class="form-control" name="Specialite">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label for="réalisé-Par" class="mr-sm-2">Réalisé-Par
                                                        :</label>
                                                    <input id="réalisé-Par" type="text" name="Realise_par" class="form-control"
                                                    >
                                                </div>
                                                <div class="col">
                                                    <label for="Encadre_par" class="mr-sm-2">Encadré-Par
                                                        :</label>
                                                    <input type="text" class="form-control" name="Encadre_par">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Mots_cle">Mots Clés
                                                    :</label>
                                                <textarea class="form-control" name="Mots_cle" id="exampleFormControlTextarea1"
                                                          rows="3"></textarea>
                                            </div>

                                            <br/>
                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Fermer
                                                </button>
                                                <button type="submit" class="btn btn-success">Rechercher</button>
                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-md-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="tab-pane fade active show" id="students" role="tabpanel"
                                     aria-labelledby="students-tab">
                                    <div class="table-responsive mt-15">
                                        <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                            <thead>
                                            <tr class="table-info ">
                                                <th>Type</th>
                                                <th>Titre</th>
                                                <th>Spécialite</th>
                                                <th>Réalisé Par</th>
                                                <th>Encadré Par</th>
                                                <th>Mots Clé</th>
                                                <th>Résumé</th>
                                                <th>Opération</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $i = 0;
                                            ?>
                                            @foreach($pfa as $p)
                                                <tr>
                                                    <?php $i++;  ?>

                                                    <td>{{$p->Type}}</td>
                                                    <td>{{$p->Titre}}</td>
                                                    <td>{{$p->Specialite}}</td>
                                                    <td>{{$p->Realise_par}}</td>
                                                    <td>{{$p->Encadre_par}}</td>
                                                    <td>{{$p->Mots_cle}}</td>
                                                    <td>


                                                        @if($p->Type=='Pfa')
                                                            <a href="{{ route('Pfa.show', $p->id) }}" type="button"
                                                               class="btn btn-warning btn-sm">Résumé</a>
                                                        @elseif($p->Type=='Stage')
                                                            <a href="{{ route('Stage.show', $p->id) }}" type="button"
                                                               class="btn btn-warning btn-sm">Résumé</a>
                                                        @else
                                                            <a href="{{ route('Pfe.show', $p->id) }}" type="button"
                                                               class="btn btn-warning btn-sm">Résumé</a>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if($p->Type=='Pfa')
                                                            <a class="btn btn-outline-info btn-sm"

                                                               @foreach($fl as $f)
                                                               @if($p->id == $f->pfa_id)

                                                               href="{{url('Download')}}/{{$p->Titre}}/{{$f->file_name}}"
                                                               role="button"><i class="fas fa-download"></i>
                                                                @endif
                                                                @endforeach
                                                            </a>
                                                        @elseif($p->Type=='Stage')
                                                            <a class="btn btn-outline-info btn-sm"

                                                               @foreach($fl2 as $f)
                                                               @if($p->id == $f->stage_id)

                                                               href="{{url('Download_stage')}}/{{$p->Titre}}/{{$f->file_name}}"
                                                               role="button"><i class="fas fa-download"></i>
                                                                @endif
                                                                @endforeach
                                                            </a>
                                                        @else
                                                            <a class="btn btn-outline-info btn-sm"

                                                               @foreach($fl3 as $f)
                                                               @if($p->id == $f->pfe_id)

                                                               href="{{url('Download_file')}}/{{$p->Titre}}/{{$f->file_name}}"
                                                               role="button"><i class="fas fa-download"></i>
                                                                @endif
                                                                @endforeach
                                                            </a>
                                                        @endif


                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        @endif
        <div class="modal fade" id="recherche" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            Rchercher d'un mémoire
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- search_form -->
                        <form action="{{route('searchS.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="Pfa">PFA
                                        :</label>
                                    <input id="pfa" type="checkbox" name="ch1" checked>
                                </div>
                                <div class="col">
                                    <label for="Stage">Stage
                                        :</label>
                                    <input type="checkbox" name="ch2" checked>
                                </div>
                                <div class="col">
                                    <label for="Pfe">PFE
                                        :</label>
                                    <input id="pfe" type="checkbox" name="ch3" checked>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="titre">Titre
                                        :</label>
                                    <input id="titre" type="text" name="Titre" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="spécialité" class="mr-sm-2">Spécialité
                                        :</label>
                                    <input type="text" class="form-control" name="Specialite">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="réalisé-Par" class="mr-sm-2">Réalisé-Par
                                        :</label>
                                    <input id="réalisé-Par" type="text" name="Realise_par" class="form-control"
                                    >
                                </div>
                                <div class="col">
                                    <label for="Encadre_par" class="mr-sm-2">Encadré-Par
                                        :</label>
                                    <input type="text" class="form-control" name="Encadre_par">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Mots_cle">Mots Clés
                                    :</label>
                                <textarea class="form-control" name="Mots_cle" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>

                            <br/>
                            <br><br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Fermer
                                </button>
                                <button type="submit" class="btn btn-success">Rechercher</button>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Status widgets-->


    {{--        <div class="card-body">--}}
    {{--          <py-script>--}}

    {{--              import matplotlib.pyplot as plt--}}
    {{--              import numpy as np--}}

    {{--              x = np.random.randn(10)--}}
    {{--              y = np.random.randn(10)--}}

    {{--              fig, ax =   plt.subplots()--}}
    {{--              ax.scatter(x, y)--}}
    {{--              fig--}}


    {{--          </py-script>--}}
    {{--        </div>--}}


    <!--=================================
            wrapper -->

        <!--=================================
footer -->

        @include('layouts.footer')
    </div><!-- main content wrapper end-->
</div>
</div>
</div>


<!--=================================
footer -->

@include('layouts.footer-scripts')
@stack('scripts')
</body>

</html>
