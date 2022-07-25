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
                        {{-- Employers ({{ count($employes) }}) --}}
                        Employers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Nouveau
                    </a>
                </li>
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

                    {{-- pagination liste des employes --}}
                    @include('admin.home.pagination_admin.pagination_liste_employer')

                </h5>

                <table class="table  table-hover table-bordered">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center">Action</td>
                            <td scope="col">Nom Complet &nbsp;<button
                                        class="btn btn_creer_trie name_trie" value="0"><i
                                            class="fa name_trie_f icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Genre</td>
                            <td scope="col">CIN</td>
                            <td scope="col">Département</td>
                            <td scope="col">Poste</td>
                            <td scope="col">Salaire &nbsp;  <button
                                        class="btn btn_creer_trie salaire_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Début &nbsp; <button
                                        class="btn btn_creer_trie debut_job_trie" value="0"><i
                                            class="fa icon_trie fa-arrow-down"></i></button></td>
                            <td scope="col">Fin</td>
                            <td scope="col">Naissance </td>
                            <td scope="col">Adresse</td>
                        </tr>
                    </thead>
                    <tbody id="list_data_trie_employes">
                        @if (count($employes) > 0)
                        @foreach ($employes as $emp)

                        @include('admin.home.edit_delete_modal')

                        <tr>
                            <td class="justify-content-center d-flex align-self-center">
                                <a data-bs-toggle="modal" href="#dropdataBoot{{ $emp->id }}" role="button"
                                    class="btn btn-outline-danger"><i class="material-icons">&#xE872;</i></a>
                                &nbsp;&nbsp;
                                <a data-bs-toggle="modal" href="#staticBackdrop{{ $emp->id }}" role="button"
                                    class="btn btn_connection"><i class="material-icons">&#xE254;</i></a>
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
                            <td> {{ $emp->naissance." (".(date('Y')-date('Y', strtotime($emp->naissance)))." ans)" }}</td>
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

    @include('admin.home.function_js_trie_admin.js_employer')
</div>
</div>
@endsection
