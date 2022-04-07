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
    <h4 class="mb-0">La liste des projets de fin d'année</h4>
    <br/>
@stop
<!-- breadcrumb -->
@endsection
@section('content')

    <!-- main body -->
    <div class="row ">


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body ">
                    <button type="button" class="button x-small m-2" data-toggle="modal" data-target="#exampleModal">
                        Ajouter Pfa
                    </button>
                    <br><br>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                            <tr>
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
                            @foreach($pfas as $pfa)
                                <tr>
                                    <?php $i++;  ?>

                                    <td>{{$pfa->Titre}}</td>
                                    <td>{{$pfa->Specialite}}</td>
                                    <td>{{$pfa->Realise_par}}</td>
                                    <td>{{$pfa->Encadre_par}}</td>
                                    <td>{{$pfa->Mots_cle}}</td>
                                    <td>
                                        <a href="{{ url('/resume/'.$pfa->id) }}" type="button"
                                           class="btn btn-warning btn-sm" ">Résumé</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#edit{{ $pfa->id }}"
                                                title="Editer"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#delete{{$pfa->id }}"
                                                title="Supprimer"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal-->
                                <div class="modal fade" id="edit{{ $pfa->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Modifications de pfa
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- update -->
                                                <form action="{{route('Pfa.update','test')}}" method="post">
                                                    {{method_field('patch')}}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="titre" class="mr-sm-2">Titre
                                                                :</label>
                                                            <input id="titre" type="text" name="Titre"
                                                                   class="form-control" value="{{$pfa->Titre}}"
                                                                   required>

                                                            <input id="id" type="hidden" name="id" class="form-control"
                                                                   value="{{$pfa->id}}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="spécialité" class="mr-sm-2">Spécialité
                                                                :</label>
                                                            <input type="text" class="form-control" name="Specialite"
                                                                   value="{{$pfa->Specialite}}" required>
                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="réalisé-Par" class="mr-sm-2">Réalisé-Par
                                                                :</label>
                                                            <input id="réalisé-Par" type="text" name="Realise_par"
                                                                   class="form-control" value="{{$pfa->Realise_par}}"
                                                                   required>
                                                        </div>
                                                        <div class="col">
                                                            <label for="Encadre_par" class="mr-sm-2">Encadré-Par
                                                                :</label>
                                                            <input type="text" class="form-control" name="Encadre_par"
                                                                   value="{{$pfa->Encadre_par}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="résumé">Mots Clés
                                                            :</label>
                                                        <textarea class="form-control" name="Mots_cle"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{$pfa->Mots_cle}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="résumé">Résumé
                                                            :</label>
                                                        <textarea class="form-control" name="Resume"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3">{{$pfa->Resume}}</textarea>
                                                    </div>
                                                    <br><br>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Fermer
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-success">Editer
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- delete  -->
                                <div class="modal fade" id="delete{{ $pfa->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    Supprimer un PFA
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('Pfa.destroy','test')}}" method="post">
                                                    {{method_field('Delete')}}
                                                    @csrf
                                                    êtes-vous sûr de vouloir supprimer ?
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                           value="{{ $pfa->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Annuler
                                                        </button>
                                                        <button type="submit"
                                                                class="btn btn-danger">Supprimer
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- add_modal_Grade -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                            Ajouter un PFA
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add_form -->
                        <form action="{{ route('Pfa.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="titre" class="mr-sm-2">Titre
                                        :</label>
                                    <input id="titre" type="text" name="Titre" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label for="spécialité" class="mr-sm-2">Spécialité
                                        :</label>
                                    <input type="text" class="form-control" name="Specialite" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="réalisé-Par" class="mr-sm-2">Réalisé-Par
                                        :</label>
                                    <input id="réalisé-Par" type="text" name="Realise_par" class="form-control"
                                           required>
                                </div>
                                <div class="col">
                                    <label for="Encadre_par" class="mr-sm-2">Encadré-Par
                                        :</label>
                                    <input type="text" class="form-control" name="Encadre_par" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="résumé">Mots Clés
                                    :</label>
                                <textarea class="form-control" name="Mots_cle" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="résumé">Résumé
                                    :</label>
                                <textarea class="form-control" name="Resume" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                            </div>
                            <br><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">Fermer
                        </button>
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>




    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
