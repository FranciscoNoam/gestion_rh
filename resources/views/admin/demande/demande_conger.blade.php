@extends('layouts.header')
@section('title')Demande Conger
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
                        En attente ({{ count($demande_conger_attente) }})
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Accepté ({{ count($demande_conger_accepter) }})
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-poste-tab" data-bs-toggle="tab" data-bs-target="#nav-poste"
                        type="button" role="tab" aria-controls="nav-poste" aria-selected="false">
                        Réfusé ({{ count($demande_conger_refuser) }})
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
                                        style="font-size: 20px;">Conger en attente</span>
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
                                                <button type="submit" class="btn btn-outline-success me-2"><i
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
                                                <button type="submit" class="btn btn-outline-success me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">
                                        <span style="position: relative; bottom: -0.2rem; ">
                                            1-0 sur 0
                                        </span>
                                        <a href="#" role="button" class="mx-1"
                                            style=" pointer-events: none;cursor: default;"><i
                                                class='fa fa-angle-left'></i></a>
                                        <a href="#" role="button" class="mx-1"
                                            style="  pointer-events: none;cursor: default;"><i
                                                class="fa fa-angle-right"></i></a>
                                    </span>
                                </div>
                            </div>
                        </h5>

                        <table class="table  table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">Action</td>
                                    <td>Motif &nbsp; <a href="#" style="color: blue"> <button
                                                class="btn btn_creer_trie num_fact_trie" value="0"><i
                                                    class="fa icon_trie fa-arrow-down"></i></button>
                                    </td>
                                    <td>Description </td>
                                    <td scope="col">Duré du conger</td>
                                    <td scope="col">Totale &nbsp; <button class="btn btn_creer_trie nom_entiter_trie"
                                            value="0"><i class="fa icon_trie fa-arrow-down"></i></button></td>
                                    <td scope="col">Employer &nbsp; <button
                                            class="btn btn_creer_trie dte_reglement_trie" value="0"><i
                                                class="fa icon_trie fa-arrow-down"></i></button>
                                    </td>

                                </tr>
                            </thead>
                            <tbody id="list_data_trie_payer">

                                @if (count($demande_conger_attente)>0)
                                @foreach ($demande_conger_attente as $attente)
                                <div class="modal fade " id="acceptdemandconger{{ $attente->id }}" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog   shadow p-3 lg-body  rounded">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success text-white">
                                                <h5 class="modal-title" id="exampleModalLabel">Acceptation du
                                                    demande de conger "{{$attente->object}}"</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('demandeconger.accept',$attente->id) }}" class="mt-5"
                                                id="msform_facture" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="text-muted">{{$attente->description}}</p>
                                                    <p>Voulez vous continuer <span style="color:green;"> ?</span></p>
                                                </div>
                                                <div class="modal-footer  justify-content-center">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        data-bs-dismiss="modal">Non,
                                                        j'annule</button>
                                                    <button type="submit" class="btn btn-outline-success">Oui, j'accepte
                                                        la
                                                        demande</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade " id="refusdemandconger{{ $attente->id }}" aria-hidden="true"
                                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog   shadow p-3 lg-body  rounded">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title" id="exampleModalLabel">Refus du
                                                    demande de conger "{{$attente->object}}"</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('demandeconger.refus',$attente->id) }}" class="mt-5"
                                                id="msform_facture" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <p class="text-muted">{{$attente->description}}</p>
                                                    <p>Voulez vous continuer <span style="color:red;"> ?</span></p>
                                                </div>
                                                <div class="modal-footer  justify-content-center">
                                                    <button type="button" class="btn btn-outline-primary"
                                                        data-bs-dismiss="modal">Non,
                                                        j'annule</button>
                                                    <button type="submit" class="btn btn-outline-success">Oui, je refuse
                                                        la
                                                        demande</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td class="justify-content-center d-flex align-self-center">
                                        <a data-bs-toggle="modal" href="#refusdemandconger{{ $attente->id }}"
                                            role="button" class="btn btn-outline-danger btn_admin"><i
                                                class="fa fa-xmark"></i></a>
                                        &nbsp;&nbsp;
                                        <a data-bs-toggle="modal" href="#acceptdemandconger{{ $attente->id }}"
                                            role="button" class="btn btn-outline-success btn_admin"><i
                                                class="fa  fa-check"></i></a>
                                    </td>

                                    <th>{{ $attente->object }} </th>
                                    <td>
                                        <p class="text-muted"> {{$attente->description}}</p>
                                    </td>
                                    <td>
                                        <h6>date: <span class="text-muted">{{ $attente->date_debut }}</span> à <span
                                                class="text-muted">{{ $attente->date_fin }}</span></h6>
                                    </td>
                                    <td> {{ $attente->totale_day_conger }} jr(s)
                                    <td>
                                        <div>
                                            <h6>{{ $attente->name." ".$attente->username }}</h6>
                                            <p><a href="#">{{ $attente->email }}</a> / {{ $attente->phone }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6" class="text-center" style="color:red;">Aucun Résultat</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                    {{-- --}}

                    <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-valide" role="tabpanel"
                        aria-labelledby="nav-valide-tab">

                        <h5 class=" mx-0">
                            <div class="row mx-3 my-1 text-success">
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-start text-center text-success"
                                        style="font-size: 20px;">Conger accepté</span>
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
                                                <button type="submit" class="btn btn-outline-success me-2"><i
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
                                                <button type="submit" class="btn btn-outline-success me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">
                                        <span style="position: relative; bottom: -0.2rem; ">
                                            1-0 sur 0
                                        </span>
                                        <a href="#" role="button" class="mx-1"
                                            style=" pointer-events: none;cursor: default;"><i
                                                class='fa fa-angle-left'></i></a>
                                        <a href="#" role="button" class="mx-1"
                                            style="  pointer-events: none;cursor: default;"><i
                                                class="fa fa-angle-right"></i></a>
                                    </span>
                                </div>
                            </div>
                        </h5>

                        <table class="table  table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td>Motif &nbsp; <a href="#" style="color: blue"> <button
                                                class="btn btn_creer_trie num_fact_trie" value="0"><i
                                                    class="fa icon_trie fa-arrow-down"></i></button>
                                    </td>
                                    <td>Description </td>
                                    <td scope="col">Duré du conger</td>
                                    <td scope="col">Totale &nbsp; <button class="btn btn_creer_trie nom_entiter_trie"
                                            value="0"><i class="fa icon_trie fa-arrow-down"></i></button></td>
                                    <td scope="col">Employer &nbsp; <button
                                            class="btn btn_creer_trie dte_reglement_trie" value="0"><i
                                                class="fa icon_trie fa-arrow-down"></i></button>
                                    </td>

                                </tr>
                            </thead>
                            <tbody id="list_data_trie_payer">

                                @if (count($demande_conger_accepter)>0)
                                @foreach ($demande_conger_accepter as $accepter)
                                <tr>
                                    <th><i class="fa fa-check text-success"></i>&nbsp; {{ $accepter->object }} </th>
                                    <td>
                                        <p class="text-muted"> {{$accepter->description}}</p>
                                    </td>
                                    <td>
                                        <h6>date: <span class="text-muted">{{ $accepter->date_debut }}</span> à <span
                                                class="text-muted">{{ $accepter->date_fin }}</span></h6>
                                    </td>
                                    <td> {{ $accepter->totale_day_conger }} jr(s)
                                    <td>
                                        <div>
                                            <h6>{{ $accepter->name." ".$accepter->username }}</h6>
                                            <p><a href="#">{{ $accepter->email }}</a> / {{ $accepter->phone }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center" style="color:red;">Aucun Résultat</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>

                    </div>
                    {{-- --}}
                    <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-poste" role="tabpanel"
                        aria-labelledby="nav-poste-tab">

                        <h5 class=" mx-0">
                            <div class="row mx-3 my-1 text-success">
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-start text-center text-success"
                                        style="font-size: 20px;">Conger refusé</span>
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
                                                <button type="submit" class="btn btn-outline-success me-2"><i
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
                                                <button type="submit" class="btn btn-outline-success me-2"><i
                                                        class="fa fa-magnifying-glass"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col">
                                    <span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">
                                        <span style="position: relative; bottom: -0.2rem; ">
                                            1-0 sur 0
                                        </span>
                                        <a href="#" role="button" class="mx-1"
                                            style=" pointer-events: none;cursor: default;"><i
                                                class='fa fa-angle-left'></i></a>
                                        <a href="#" role="button" class="mx-1"
                                            style="  pointer-events: none;cursor: default;"><i
                                                class="fa fa-angle-right"></i></a>
                                    </span>
                                </div>
                            </div>
                        </h5>

                        <table class="table  table-hover table-bordered">
                            <thead>
                                <tr>
                                    <td>Motif &nbsp; <a href="#" style="color: blue"> <button
                                                class="btn btn_creer_trie num_fact_trie" value="0"><i
                                                    class="fa icon_trie fa-arrow-down"></i></button>
                                    </td>
                                    <td>Description </td>
                                    <td scope="col">Duré du conger</td>
                                    <td scope="col">Totale &nbsp; <button class="btn btn_creer_trie nom_entiter_trie"
                                            value="0"><i class="fa icon_trie fa-arrow-down"></i></button></td>
                                    <td scope="col">Employer &nbsp; <button
                                            class="btn btn_creer_trie dte_reglement_trie" value="0"><i
                                                class="fa icon_trie fa-arrow-down"></i></button>
                                    </td>

                                </tr>
                            </thead>
                            <tbody id="list_data_trie_payer">

                                @if (count($demande_conger_refuser)>0)
                                @foreach ($demande_conger_refuser as $refuser)
                                <tr>
                                    <th><i class="fa fa-xmark text-danger"></i>&nbsp; {{ $refuser->object }} </th>
                                    <td>
                                        <p class="text-muted"> {{$refuser->description}}</p>
                                    </td>
                                    <td>
                                        <h6>date: <span class="text-muted">{{ $refuser->date_debut }}</span> à <span
                                                class="text-muted">{{ $refuser->date_fin }}</span></h6>
                                    </td>
                                    <td> {{ $refuser->totale_day_conger }} jr(s)
                                    <td>
                                        <div>
                                            <h6>{{ $refuser->name." ".$refuser->username }}</h6>
                                            <p><a href="#">{{ $refuser->email }}</a> / {{ $refuser->phone }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center" style="color:red;">Aucun Résultat</td>
                                </tr>
                                @endif


                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection
