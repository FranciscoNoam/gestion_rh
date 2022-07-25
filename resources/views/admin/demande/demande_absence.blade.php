@extends('layouts.header')
@section('title')Demande d'Absence
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="mb-5">
            <ul class="nav nav-tabs d-flex flex-row navigation_module" id="myTab">
                <li class="nav-item">
                    <a href="#" class="nav-link active" id="nav-brouilon-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-brouilon" type="button" role="tab" aria-controls="nav-brouilon"
                        aria-selected="true">
                        En attente ({{ count($demande_absence_attente) }})
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Accepté ({{ count($demande_absence_accepter) }})
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-poste-tab" data-bs-toggle="tab" data-bs-target="#nav-poste"
                        type="button" role="tab" aria-controls="nav-poste" aria-selected="false">
                        Réfusé ({{ count($demande_absence_refuser) }})
                    </a>
                </li>

            </ul>
        </div>

        <style>
            /* .btn_admin:hover{
                color:white;
            } */
            /* table,
            th {
                font-size: 11px;
            }

            table,
            td {
                font-size: 11px;
            } */
        </style>
        {{-- <div class="row">
            <div class="col"></div>
            <div class="col"> --}}

                <div class="tab-content" id="nav-tabContent">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    <div class="tab-pane fade show active shadow rounded px-2 mx-3 py-3" id="nav-brouilon"
                        role="tabpanel" aria-labelledby="nav-brouilon-tab">

                        <h5 class=" mx-0">
                            <div class="row mx-3 my-1 text-success">
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-start text-center text-success"
                                        style="font-size: 20px;">Absence en attente</span>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="form-control-label me-2">Employer</label>
                                            <input type="text" name="search_name" id="search_name"
                                                placeholder="Nom ou Prenom" class="form-control-input me-2">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn_connection me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="form-control-label me-2">Mois</label>
                                            <input type="month" name="search_name" id="search_name"
                                                placeholder="employer" class="form-control-input me-2">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn_connection me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">

                                    @include('admin.demande.pagination.pagination_absence_attente')


                                </div>
                            </div>
                        </h5>

                       @include('admin.demande.includes.demande_absence_en_attente')

                    </div>
                    {{-- --}}

                    <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-valide" role="tabpanel"
                        aria-labelledby="nav-valide-tab">

                        <h5 class=" mx-0">
                            <div class="row mx-3 my-1 text-success">
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-start text-center text-success"
                                        style="font-size: 20px;">Absence accepté</span>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="form-control-label me-2">Employer</label>
                                            <input type="text" name="search_name" id="search_name"
                                                placeholder="Nom ou Prenom" class="form-control-input me-2">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn_connection me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="form-control-label me-2">Mois</label>
                                            <input type="month" name="search_name" id="search_name"
                                                placeholder="employer" class="form-control-input me-2">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn_connection me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">

                                    @include('admin.demande.pagination.pagination_absence_accepter')
                                </div>
                            </div>
                        </h5>

                        @include('admin.demande.includes.demande_absence_accepter')

                    </div>
                    {{-- --}}
                    <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-poste" role="tabpanel"
                        aria-labelledby="nav-poste-tab">

                        <h5 class=" mx-0">
                            <div class="row mx-3 my-1 text-success">
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-start text-center text-success"
                                        style="font-size: 20px;">Absence refusé</span>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="form-control-label me-2">Employer</label>
                                            <input type="text" name="search_name" id="search_name"
                                                placeholder="Nom ou Prenom" class="form-control-input me-2">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn_connection me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <label for="" class="form-control-label me-2">Mois</label>
                                            <input type="month" name="search_name" id="search_name"
                                                placeholder="employer" class="form-control-input me-2">
                                            <div class="text-end">
                                                <button type="submit" class="btn btn_connection me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">

                                          @include('admin.demande.pagination.pagination_absence_refuser')


                                </div>
                            </div>
                        </h5>

                        @include('admin.demande.includes.demande_absence_refuser')

                    </div>

                </div>

                {{--
            </div>
            <div class="col"></div>
        </div>
        --}}

    </div>

</div>
</div>
@endsection
