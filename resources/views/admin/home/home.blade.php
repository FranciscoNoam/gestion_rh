@extends('layouts.header')
@section('title') Employers
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
                        Employers ({{ count($employes) }})
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Nouveau
                    </a>
                </li>

                {{-- <div class="justify-content-end d-flex align-self-end">
                    <form action="{{ route('employe.filtre') }}" class="formulaire_new d-flex justify-content-end"
                        id="msform_facture" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="search_name" id="search_name" placeholder="Nom ou Prénom"
                            class="form-control-label me-2">
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-success me-2">chercher</button>
                        </div>
                    </form>
                </div> --}}

            </ul>


        </div>

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
            <div class="tab-pane fade show active shadow rounded px-2 mx-3 py-3" id="nav-brouilon" role="tabpanel"
                aria-labelledby="nav-brouilon-tab">

                <h5 class=" mx-0">
                    <div class="row mx-3 my-1 text-success">
                        <div class="col">
                            <span class="mt-0 d-flex justify-content-start text-center text-success"
                                style="font-size: 20px;">Liste employer</span>
                        </div>
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('employe.filtre') }}"
                                    class="formulaire_new d-flex justify-content-end" id="msform_facture" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="search_name" id="search_name" placeholder="Nom ou Prénom"
                                        class="form-control-label me-2">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-outline-success me-2">chercher</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col mx-2">
                            <span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">
                                <span style="position: relative; bottom: -0.2rem; ">
                                    1-0 sur 0
                                </span>
                                <a href="#" role="button" class="mx-1" style=" pointer-events: none;cursor: default;"><i
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
                            <td scope="col" class="text-center">Action</td>
                            <td scope="col">Nom Complet &nbsp; <a href="#" style="color: blue"> <button
                                        class="btn btn_creer_trie num_fact_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Genre</td>
                            <td scope="col">CIN</td>
                            <td scope="col">Département &nbsp; <a href="#" style="color: blue"> <button
                                        class="btn btn_creer_trie num_fact_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Poste</td>
                            <td scope="col">Salaire &nbsp; <a href="#" style="color: blue"> <button
                                        class="btn btn_creer_trie num_fact_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Début &nbsp; <a href="#" style="color: blue"> <button
                                        class="btn btn_creer_trie num_fact_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Fin</td>
                            <td scope="col">Naissance &nbsp; <a href="#" style="color: blue"> <button
                                        class="btn btn_creer_trie num_fact_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Adresse</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($employes) > 0)
                        @foreach ($employes as $emp)

                        @include('admin.home.edit_delete_modal')

                        <tr>
                            <td class="justify-content-center d-flex align-self-center">
                                <a data-bs-toggle="modal" href="#dropdataBoot{{ $emp->id }}" role="button"
                                    class="btn btn-outline-danger"><i class="material-icons">&#xE872;</i></a>
                                    &nbsp;&nbsp;
                                    <a data-bs-toggle="modal" href="#staticBackdrop{{ $emp->id }}" role="button"
                                        class="btn btn-outline-success"><i class="material-icons">&#xE254;</i></a>
                                </td>
                            <td>
                                <div>
                                    <h6>{{ $emp->name." ".$emp->username }}</h6>
                                    <p><a href="#">{{ $emp->email}}</a> / {{ $emp->phone }}</p>
                                </div>

                            </td>
                            <td>{{ $emp->name_genre }}</td>
                            <td>{{ $emp->cin }} </td>
                            <td>{{ $emp->name_departement}}</td>

                            <td>{{ $emp->name_poste }}</td>
                            <td>AR {{ number_format($emp->salaire,0,","," ") }} </td>
                            <td> {{ $emp->debut_job }}</td>
                            <td> @if ($emp->fin_job!=null)
                                <div
                                    style="background-color: red; border-radius: 10px; text-align: center;color: white">
                                    {{ $emp->fin_job }}</div>

                                @else
                                <div
                                    style="background-color: green; border-radius: 10px; text-align: center;color: white">
                                    Non Défini</div>

                                @endif
                            </td>
                            <td> {{ $emp->naissance }}</td>
                            <td> {{ $emp->adresse }}</td>

                        </tr>

                        {{-- =========================================== Modal de modification =========================
                        --}}

                        {{-- ====================== Fin Modal ================ --}}
                        @endforeach
                        @else
                        <tr>
                            <td colspan="12" class="text-center" style="color:red;">Aucun Résultat</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


            <div class="tab-pane fade shadow rounded px-2 mx-3 py-3" id="nav-valide" role="tabpanel"
                aria-labelledby="nav-valide-tab">

                @include('admin.home.nouveau_employer')


            </div>
        </div>
    </div>

</div>
</div>
@endsection
