@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Liste des Pfa
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    <h4 class="mb-0">Recherche</h4>
    <br/>
@stop
<!-- breadcrumb -->
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <button type="button" class="button x-small m-2" data-toggle="modal" data-target="#recherche">
                        Recherche
                    </button>
                    <br><br>
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
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#edit{{ $p->id }}"
                                                        title="Editer"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                        data-target="#delete{{$p->id }}"
                                                        title="Supprimer"><i
                                                        class="fa fa-trash"></i></button>


                                                @if($p->Type=='Pfa')
                                                    <a class="btn btn-outline-info btn-sm"

                                                       @foreach($fl as $f)
                                                       @if($p->id == $f->pfa_id)

                                                       href="{{url('Download_file_pfa')}}/{{$p->Titre}}/{{$f->file_name}}"
                                                       role="button"><i class="fas fa-download"></i>
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                @elseif($p->Type=='Stage')
                                                    <a class="btn btn-outline-info btn-sm"

                                                       @foreach($fl2 as $f)
                                                       @if($p->id == $f->stage_id)

                                                       href="{{url('Download_file_stage')}}/{{$p->Titre}}/{{$f->file_name}}"
                                                       role="button"><i class="fas fa-download"></i>
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                @else
                                                    <a class="btn btn-outline-info btn-sm"

                                                       @foreach($fl3 as $f)
                                                       @if($p->id == $f->pfe_id)

                                                       href="{{url('Download_file_pfe')}}/{{$p->Titre}}/{{$f->file_name}}"
                                                       role="button"><i class="fas fa-download"></i>
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                @endif


                                            </td>
                                        </tr>
                                        <!-- edit_modal-->
                                        <div class="modal fade" id="edit{{ $p->id }}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            Modifications de {{$p->Type}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- update -->
                                                        @if($p->Type=='Pfa')
                                                            <form action="{{route('Pfa.update','test')}}" method="post">
                                                                {{method_field('patch')}}
                                                                @elseif($p->Type=='Stage')
                                                                    <form action="{{route('Stage.update','test')}}"
                                                                          method="post">
                                                                        {{method_field('patch')}}
                                                                        @else
                                                                            <form
                                                                                action="{{route('Pfe.update','test')}}"
                                                                                method="post">
                                                                                {{method_field('patch')}}
                                                                                @endif
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="titre"
                                                                                               class="mr-sm-2">Titre
                                                                                            :</label>
                                                                                        <input id="titre" type="text"
                                                                                               name="Titre"
                                                                                               class="form-control"
                                                                                               value="{{$p->Titre}}"
                                                                                               required>

                                                                                        <input id="id" type="hidden"
                                                                                               name="id"
                                                                                               class="form-control"
                                                                                               value="{{$p->id}}">
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="spécialité"
                                                                                               class="mr-sm-2">Spécialité
                                                                                            :</label>
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               name="Specialite"
                                                                                               value="{{$p->Specialite}}"
                                                                                               required>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="réalisé-Par"
                                                                                               class="mr-sm-2">Réalisé-Par
                                                                                            :</label>
                                                                                        <input id="réalisé-Par"
                                                                                               type="text"
                                                                                               name="Realise_par"
                                                                                               class="form-control"
                                                                                               value="{{$p->Realise_par}}"
                                                                                               required>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="Encadre_par"
                                                                                               class="mr-sm-2">Encadré-Par
                                                                                            :</label>
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               name="Encadre_par"
                                                                                               value="{{$p->Encadre_par}}"
                                                                                               required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="résumé">Mots Clés
                                                                                        :</label>
                                                                                    <textarea class="form-control"
                                                                                              name="Mots_cle"
                                                                                              id="exampleFormControlTextarea1"
                                                                                              rows="3">{{$p->Mots_cle}}</textarea>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="résumé">Résumé
                                                                                        :</label>
                                                                                    <textarea class="form-control"
                                                                                              name="Resume"
                                                                                              id="exampleFormControlTextarea1"
                                                                                              rows="3">{{$p->Resume}}</textarea>
                                                                                </div>

                                                                                <br><br>


                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Fermer
                                                                                    </button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-success">
                                                                                        Editer
                                                                                    </button>
                                                                                </div>
                                                                            </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- delete  -->
                                        <div class="modal fade" id="delete{{ $p->id }}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                            class="modal-title"
                                                            id="exampleModalLabel">
                                                            Supprimer un {{$p->Type}}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        @if($p->Type=='Pfa')
                                                            <form action="{{route('Pfa.destroy','test')}}"
                                                                  method="post">
                                                                {{method_field('Delete')}}
                                                                @elseif($p->Type=='Stage')
                                                                    <form action="{{route('Stage.destroy','test')}}"
                                                                          method="post">
                                                                        {{method_field('Delete')}}
                                                                        @else
                                                                            <form
                                                                                action="{{route('Pfe.destroy','test')}}"
                                                                                method="post">
                                                                                {{method_field('Delete')}}
                                                                                @endif


                                                                                @csrf
                                                                                êtes-vous sûr de vouloir supprimer ?
                                                                                <input id="id" type="hidden" name="id"
                                                                                       class="form-control"
                                                                                       value="{{ $p->id }}">
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">Annuler
                                                                                    </button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">
                                                                                        Supprimer
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
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
                        <form action="{{route('search.store')}}" method="POST" enctype="multipart/form-data">
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
    </div>








@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
