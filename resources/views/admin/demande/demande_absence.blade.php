@extends('layouts.header')
@section('title')Demande Absence
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
                        En attente (1)
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Accepté (1)
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-poste-tab" data-bs-toggle="tab" data-bs-target="#nav-poste"
                        type="button" role="tab" aria-controls="nav-poste" aria-selected="false">
                        Réfusé (1)
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
                                            <input type="text" name="search_name" id="search_name"
                                                placeholder="employer" class="form-control-label me-2">
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-outline-success me-2">chercher</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col mx-2">


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

                                <tr>
                                    <td class="justify-content-center d-flex align-self-center">
                                        <a data-bs-toggle="modal" href="#dropDatapost" role="button"
                                            class="btn btn-outline-danger btn_admin"><i class="fa fa-xmark"></i></a>
                                        &nbsp;&nbsp;
                                        <a data-bs-toggle="modal" href="#NewDatapost" role="button"
                                            class="btn btn-outline-success btn_admin"><i class="fa  fa-check"></i></a>
                                    </td>
                                    <th>Mariage </th>
                                    <td>
                                        <p class="text-muted"> je vais faire mon mariage et je ne peux pas travailler
                                        </p>
                                    </td>
                                    <td>
                                        <h6>date: <span class="text-muted">2022-01-01</span> à <span
                                                class="text-muted">2022-01-02</span></h6>
                                        <p>heure: <span class="text-muted">08:00</span> à <span
                                                class="text-muted">10:00</span></p>
                                    </td>
                                    <td> 9 jr</td>

                                    <td>
                                        <div>
                                            <h6>Noam Francisco</h6>
                                            <p><a href="#">antoenjara1998@gmail.com</a></p>
                                        </div>
                                    </td>
                                    {{-- <i class="fa fa-edit"></i> --}}

                                </tr>

                                {{-- <tr>
                                    <td colspan="11" class="text-center" style="color:red;">Aucun Résultat</td>
                                </tr> --}}

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
                                        style="font-size: 20px;">Absence accepté</span>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="search_name" id="search_name"
                                                placeholder="employer" class="form-control-label me-2">
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-outline-success me-2">chercher</button>
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

                                <tr>
                                    <th><i class="fa  fa-check text-success"></i>&nbsp; Mariage </th>
                                    <td>
                                        <p class="text-muted"> je vais faire mon mariage et je ne peux pas travailler
                                        </p>
                                    </td>
                                    <td>
                                        <h6>date: <span class="text-muted">2022-01-01</span> à <span
                                                class="text-muted">2022-01-02</span></h6>
                                        <p>heure: <span class="text-muted">08:00</span> à <span
                                                class="text-muted">10:00</span></p>
                                    </td>
                                    <td> 9 jr</td>

                                    <td>
                                        <div>
                                            <h6>Noam Francisco</h6>
                                            <p><a href="#">antoenjara1998@gmail.com</a></p>
                                        </div>
                                    </td>
                                    {{-- <i class="fa fa-edit"></i> --}}

                                </tr>

                                {{-- <tr>
                                    <td colspan="11" class="text-center" style="color:red;">Aucun Résultat</td>
                                </tr> --}}

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
                                        style="font-size: 20px;">Absence refusé</span>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end">
                                        <form action="#" class="formulaire_new d-flex justify-content-end"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="search_name" id="search_name"
                                                placeholder="employer" class="form-control-label me-2">
                                            <div class="text-end">
                                                <button type="submit"
                                                    class="btn btn-outline-success me-2">chercher</button>
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

                                <tr>
                                    <th><i class="fa fa-xmark text-danger"></i>&nbsp; Mariage </th>
                                    <td>
                                        <p class="text-muted"> je vais faire mon mariage et je ne peux pas travailler
                                        </p>
                                    </td>
                                    <td>
                                        <h6>date: <span class="text-muted">2022-01-01</span> à <span
                                                class="text-muted">2022-01-02</span></h6>
                                        <p>heure: <span class="text-muted">08:00</span> à <span
                                                class="text-muted">10:00</span></p>

                                    </td>
                                    <td> 9 jr</td>

                                    <td>
                                        <div>
                                            <h6>Noam Francisco</h6>
                                            <p><a href="#">antoenjara1998@gmail.com</a></p>
                                        </div>
                                    </td>
                                    {{-- <i class="fa fa-edit"></i> --}}

                                </tr>

                                {{-- <tr>
                                    <td colspan="11" class="text-center" style="color:red;">Aucun Résultat</td>
                                </tr> --}}

                            </tbody>
                        </table>

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
