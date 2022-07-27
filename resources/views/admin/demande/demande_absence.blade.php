@extends('layouts.header')
@section('title')Demande d'Absence
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="mb-5">
            <ul class="nav nav-tabs d-flex flex-row navigation_module" id="myTab">
                <li class="nav-item">
                    @if (isset($page_cible))
                    @if ($page_cible=='&attente')

                    <a href="#" class="nav-link active" id="nav-brouilon-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-brouilon" type="button" role="tab" aria-controls="nav-brouilon"
                        aria-selected="true">

                        @else

                        <a href="#" class="nav-link" id="nav-brouilon-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-brouilon" type="button" role="tab" aria-controls="nav-brouilon"
                            aria-selected="false">

                            @endif

                          
                            @else

                            <a href="#" class="nav-link active" id="nav-brouilon-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-brouilon" type="button" role="tab" aria-controls="nav-brouilon"
                                aria-selected="true">

                                @endif
                                En attente ({{ count($demande_absence_attente) }})
                            </a>
                </li>

                <li class="nav-item">
                    @if (isset($page_cible))
                    @if ($page_cible=='&accepter')

                    <a href="#" class="nav-link active" id="nav-valide-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-valide" type="button" role="tab" aria-controls="nav-valide"
                        aria-selected="true">

                        @else

                        <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-valide" type="button" role="tab" aria-controls="nav-valide"
                            aria-selected="false">

                            @endif
                            @else

                            <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-valide" type="button" role="tab" aria-controls="nav-valide"
                                aria-selected="false">

                                @endif

                                Accepté ({{ count($demande_absence_accepter) }})
                            </a>
                </li>

                <li class="nav-item">
                    @if (isset($page_cible))
                    @if ($page_cible=='&refuser')

                    <a href="#" class="nav-link active" id="nav-poste-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-poste" type="button" role="tab" aria-controls="nav-poste"
                        aria-selected="true">

                        @else

                        <a href="#" class="nav-link" id="nav-poste-tab" data-bs-toggle="tab" data-bs-target="#nav-poste"
                            type="button" role="tab" aria-controls="nav-poste" aria-selected="false">

                            @endif
                            @else

                            <a href="#" class="nav-link" id="nav-poste-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-poste" type="button" role="tab" aria-controls="nav-poste"
                                aria-selected="false">

                                @endif

                                Réfusé ({{ count($demande_absence_refuser) }})
                            </a>
                </li>

            </ul>
        </div>


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

                    @if (isset($page_cible))
                    @if ($page_cible=='&attente')

                    <div class="tab-pane fade show active shadow rounded px-2 mx-3 py-3" id="nav-brouilon"
                        role="tabpanel" aria-labelledby="nav-brouilon-tab">

                        @else

                        <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-brouilon" role="tabpanel"
                            aria-labelledby="nav-brouilon-tab">


                            @endif
                            @else

                            <div class="tab-pane fade show active shadow rounded px-2 mx-3 py-3" id="nav-brouilon"
                                role="tabpanel" aria-labelledby="nav-brouilon-tab">

                                @endif

                                {{-- <div class="tab-pane fade show active shadow rounded px-2 mx-3 py-3"
                                    id="nav-brouilon" role="tabpanel" aria-labelledby="nav-brouilon-tab"> --}}

                                    <h5 class=" mx-0">
                                        <div class="row mx-3 my-1 text-success">
                                            <div class="col">
                                                <span class="mt-0 d-flex justify-content-start text-center text-success"
                                                    style="font-size: 20px;">Absence en attente</span>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex justify-content-end">
                                                    <form action="{{ route('demandeabsence.filtre') }}" class="formulaire_new d-flex justify-content-end"
                                                        id="msform_facture" method="GET" enctype="multipart/form-data">
                                                        @csrf
                                                        <label for="" class="form-control-label me-2">Employer</label>
                                                        <input type="text" name="search_name" id="search_name" placeholder="Nom ou Prenom" required class="form-control-input me-2">
                                                        <input type="text" name="page_cible" value="&attente" id="page_cible" hidden required class="form-control-input me-2">

                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn_connection me-2"><i
                                                                    class="fa fa-magnifying-glass"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="d-flex justify-content-end">
                                                    <form action="{{ route('demandeabsence.month') }}"
                                                    class="formulaire_new d-flex justify-content-end"
                                                    id="msform_facture" method="GET"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <label for=""
                                                        class="form-control-label me-2">Mois</label>
                                                    <input type="month" name="search_month" id="search_month" placeholder="employer" required
                                                        class="form-control-input me-2">
                                                        <input type="text" name="page_cible" value="&attente" id="page_cible" hidden required class="form-control-input me-2">
                                                    <div class="text-end">
                                                        <button type="submit"
                                                            class="btn btn_connection me-2"><i
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

                                @if (isset($page_cible))
                                @if ($page_cible=='&accepter')

                                <div class="tab-pane fade shadow  show active  px-2 mx-3 py-3" id="nav-valide"
                                    role="tabpanel" aria-labelledby="nav-valide-tab">

                                    @else

                                    <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-valide"
                                        role="tabpanel" aria-labelledby="nav-valide-tab">


                                        @endif
                                        @else
                                        <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-valide"
                                            role="tabpanel" aria-labelledby="nav-valide-tab">

                                            @endif

                                            {{-- <div class="tab-pane fade shadow rounded px-2 mx-3 py-3"
                                                id="nav-valide" role="tabpanel" aria-labelledby="nav-valide-tab"> --}}

                                                <h5 class=" mx-0">
                                                    <div class="row mx-3 my-1 text-success">
                                                        <div class="col">
                                                            <span
                                                                class="mt-0 d-flex justify-content-start text-center text-success"
                                                                style="font-size: 20px;">Absence accepté</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex justify-content-end">
                                                                <form action="{{ route('demandeabsence.filtre') }}" class="formulaire_new d-flex justify-content-end"
                                                                id="msform_facture" method="GET" enctype="multipart/form-data">
                                                                @csrf
                                                                <label for="" class="form-control-label me-2">Employer</label>
                                                                <input type="text" name="search_name" id="search_name" placeholder="Nom ou Prenom" required class="form-control-input me-2">
                                                                <input type="text" name="page_cible" value="&accepter" id="page_cible" hidden required class="form-control-input me-2">

                                                                <div class="text-end">
                                                                    <button type="submit" class="btn btn_connection me-2"><i
                                                                            class="fa fa-magnifying-glass"></i></button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex justify-content-end">
                                                                <form action="{{ route('demandeabsence.month') }}"
                                                                    class="formulaire_new d-flex justify-content-end"
                                                                    id="msform_facture" method="GET"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label for=""
                                                                        class="form-control-label me-2">Mois</label>
                                                                    <input type="month" name="search_month" id="search_month" placeholder="employer" required
                                                                        class="form-control-input me-2">
                                                                        <input type="text" name="page_cible" value="&accepter" id="page_cible" hidden required class="form-control-input me-2">
                                                                    <div class="text-end">
                                                                        <button type="submit"
                                                                            class="btn btn_connection me-2"><i
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

                                            @if (isset($page_cible))
                                            @if ($page_cible=='&refuser')

                                            <div class="tab-pane fade shadow show active rounded px-2 mx-3 py-3" id="nav-poste"
                                            role="tabpanel" aria-labelledby="nav-poste-tab">

                                                @else

                                                <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-poste"
                                                role="tabpanel" aria-labelledby="nav-poste-tab">
                                                    @endif
                                                    @else
                                                    <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-poste"
                                                    role="tabpanel" aria-labelledby="nav-poste-tab">

                                                        @endif

                                            {{-- <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-poste"
                                                role="tabpanel" aria-labelledby="nav-poste-tab"> --}}

                                                <h5 class=" mx-0">
                                                    <div class="row mx-3 my-1 text-success">
                                                        <div class="col">
                                                            <span
                                                                class="mt-0 d-flex justify-content-start text-center text-success"
                                                                style="font-size: 20px;">Absence refusé</span>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex justify-content-end">
                                                                <form action="{{ route('demandeabsence.filtre') }}" class="formulaire_new d-flex justify-content-end"
                                                                id="msform_facture" method="GET" enctype="multipart/form-data">
                                                                @csrf
                                                                <label for="" class="form-control-label me-2">Employer</label>
                                                                <input type="text" name="search_name" id="search_name" placeholder="Nom ou Prenom" required class="form-control-input me-2">
                                                                <input type="text" name="page_cible" value="&refuser" id="page_cible" hidden required class="form-control-input me-2">

                                                                <div class="text-end">
                                                                    <button type="submit" class="btn btn_connection me-2"><i
                                                                            class="fa fa-magnifying-glass"></i></button>
                                                                </div>
                                                            </form>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex justify-content-end">
                                                                <form action="{{ route('demandeabsence.month') }}"
                                                                    class="formulaire_new d-flex justify-content-end"
                                                                    id="msform_facture" method="GET"
                                                                    enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label for=""
                                                                        class="form-control-label me-2">Mois</label>
                                                                    <input type="month" name="search_month" id="search_month" placeholder="employer" required
                                                                        class="form-control-input me-2">
                                                                        <input type="text" name="page_cible" value="&refuser" id="page_cible" hidden required class="form-control-input me-2">
                                                                    <div class="text-end">
                                                                        <button type="submit"
                                                                            class="btn btn_connection me-2"><i
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
{{-- =========== importation function JS --}}
                    @include('admin.demande.function_js_trie.demande_absence_js')

                    @endsection
