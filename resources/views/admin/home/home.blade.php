@extends('layouts.header')
@section('title')ASA-RH/ Employers
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
                        Employers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Nouveau
                    </a>
                </li>
                <li class="nav-item">
                      <form action="{{ route('employe.filtre') }}" class="formulaire_new d-flex" id="msform_facture"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="search_name" id="search_name" placeholder="Nom ou Prénom"
                                class="form-control-label me-2">
                            <div class="text-end">
                                <button type="submit" class="btn btn-outline-success me-2">chercher</button>
                            </div>
                        </form>
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
            <div class="tab-pane fade show active" id="nav-brouilon" role="tabpanel" aria-labelledby="nav-brouilon-tab">
                {{-- <h6 style="color: #AA076B">Facture En Brouillon</h6> --}}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2">Action</th>
                            <th scope="col">Nom Complet</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Email</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">CIN</th>
                            <th scope="col">Département</th>
                            <th scope="col">Poste</th>
                            <th scope="col">Salaire</th>
                            <th scope="col">Début</th>
                            <th scope="col">Fin</th>
                            <th scope="col">Naissance</th>
                            <th scope="col">Adresse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($employes) > 0)
                        @foreach ($employes as $emp)

                        @include('admin.home.edit_delete_modal')

                        <tr>
                            <td> <a data-bs-toggle="modal" href="#dropdataBoot{{ $emp->id }}" role="button"
                                    class="btn btn-link" style="color:red;"><i class="material-icons">&#xE872;</i></a>
                            </td>
                            <td> <a data-bs-toggle="modal" href="#staticBackdrop{{ $emp->id }}" role="button"
                                    class="btn btn-link" style="color:green;"><i class="material-icons">&#xE254;</i></a>
                            </td>

                            <th>
                                {{ $emp->name." ".$emp->username }}
                            </th>
                            <td>{{ $emp->name_genre }}</td>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->phone }}</td>
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
                            <td colspan="13" class="text-center" style="color:red;">Aucun Résultat</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


            <div class="tab-pane fade " id="nav-valide" role="tabpanel" aria-labelledby="nav-valide-tab">

                @include('admin.home.nouveau_employer')


            </div>
        </div>
    </div>

</div>
</div>
@endsection