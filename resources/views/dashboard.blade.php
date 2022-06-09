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
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">Dashboard Admin</h4>
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
                                    <span class="text-danger">
                                       <i class="fas fa-light fa-diploma highlight-icon" aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Pfa</p>
                                <h4>{{App\Models\Pfa::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">
                            <a href="{{route('Pfa.index')}}" target="_blank"><span class="text-danger">Afficher les données</span></a>
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
                            <a href="{{route('Pfe.index')}}" target="_blank"><span class="text-danger">Afficher les données</span></a>
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
                            <a href="{{route('Stage.index')}}" target="_blank"><span class="text-danger">Afficher les données</span></a>
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
                                      <i class="fas fa-solid fa-users highlight-icon" aria-hidden="true"></i>

                                    </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">Utilisateurs</p>
                                <h4>{{App\Models\Admin::count()}}</h4>
                            </div>
                        </div>
                        <p class="text-muted pt-3 mb-0 mt-2 border-top">

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Status widgets-->
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders Status widgets-->
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
