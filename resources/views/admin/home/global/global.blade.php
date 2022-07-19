@extends('layouts.header')
@section('title')OIG-RH/ Génerale
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
                        Département
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-valide-tab" data-bs-toggle="tab" data-bs-target="#nav-valide"
                        type="button" role="tab" aria-controls="nav-valide" aria-selected="false">
                        Genre
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link" id="nav-poste-tab" data-bs-toggle="tab" data-bs-target="#nav-poste"
                        type="button" role="tab" aria-controls="nav-poste" aria-selected="false">
                        Poste
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
                    <div class="tab-pane fade show active shadow rounded px-2 py-5 mx-3" id="nav-brouilon"
                        role="tabpanel" aria-labelledby="nav-brouilon-tab">
                        <h4>Département</h4>
                        @include('admin.home.global.departement')

                    </div>
                    {{-- --}}

                    <div class="tab-pane fade shadow rounded px-2 py-5 mx-3" id="nav-valide" role="tabpanel"
                        aria-labelledby="nav-valide-tab">
                        <h4>Genres</h4>
                        @include('admin.home.global.genre')

                    </div>
                    {{-- --}}
                    <div class="tab-pane fade shadow rounded px-2 py-5 mx-3" id="nav-poste" role="tabpanel"
                        aria-labelledby="nav-poste-tab">
                        <h4>Postes</h4>
                        @include('admin.home.global.poste')

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
