@extends('layouts.header')
@section('title')Fiche de paie
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">

        <nav class="navbar navbar-expand-lg bg-light justify-content-text-center">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>

                    <div class="d-flex justify-content-end">
                        <label class="form-control-label me-2">Entrer le mois du paie</label>
                        <form action="{{ route('employe.filtre') }}" class="formulaire_new d-flex" id="msform_facture"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="month" name="search_name" id="search_name" class="form-control-label me-2">
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-success me-2">chercher</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </nav><hr>


        <div class="row justify-content-center">
            <div class="col"></div>
            <div class="col-8">

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                          <th scope="col" >#</th>
                          <th scope="col">Détail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td scope="row"><h6>De 01-01-2022 à 01-02-2022</h6></td>
                          <td> <div>
                            <h5>Fiche de paie pour le mois de Janvier 2022</h5>
                            <p>Bonjour, votre fiche de paie pour le mois est prête. Pour voir plus de détail, veuiller
                                cliquer sur "détail"!</p>
                        </div></td>
                        </tr>
                      </tbody>
                  </table>


            </div>
        </div>

    </div>
</div>
@endsection
