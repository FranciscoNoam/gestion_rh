@extends('layouts.connexion.header')

@section('login_user')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="shadow p-3 bg-body  rounded">
            <div class="d-flex justify-content-center align-center">
                <img src="{{ asset('logo/zaha.jpg') }}" width="80" height="80" class="d-inline-block align-text-top"
                    alt="" srcset="">
            </div>
            <h4 class="text-center text-success">Connexion</h4>

            <form action="{{route('login')}}" class="formulaire mt-5" id="msform_facture" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="form-group my-1">
                    <label for="identifiant" class="mb-1 form-control-placeholder">Email<strong
                            style="color:#ff0000;">*</strong></label>
                    <input type="text" name="identifiant" class="form-control input_inscription" placeholder="email"
                        id="identifiant" required />
                </div>
                <div class="form-group my-1">
                    <label for="password" class="mb-1 form-control-placeholder">Mot de passe<strong
                            style="color:#ff0000;">*</strong></label>
                    <input type="password" name="password" class="form-control input_inscription" placeholder="password"
                        id="password" required />
                </div>

                <div class="d-flex justify-content-center">
                    <input type="submit" name="next" class=" my-2 btn btn-success sidentifier " value="S'identifier" />
                </div>


            </form>

            @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
