@guest

@extends('layouts.connexion.header')

@section('login_user')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="shadow p-3 bg-body  rounded">
            <div class="d-flex justify-content-center align-center">
                <img src="{{ asset('logo/oig_violet.jpg') }}" width="80" height="80"
                    class="d-inline-block align-text-top" alt="" srcset="">
            </div>
            <h4 class="text-center title">Connexion</h4>

            {{-- <form action="{{route('login')}}" class="formulaire mt-5" id="msform_facture" method="POST"
                enctype="multipart/form-data">--}}
                <form method="post" action="{{ route('login.perform') }}" class="login_user">

                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    @if(isset ($errors) && count($errors) > 0)
                    <div class="alert alert-warning" role="alert">
                        <ul class="list-unstyled mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="form-group my-1">
                        <label for="identifiant" class="mb-1 form-control-placeholder">Email<strong
                                style="color:#ff0000;">*</strong></label>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="form-control input_inscription" placeholder="email" id="identifiant" required />
                        @if(Session::has('error'))
                        <p class="text-danger" style="font-family: bold;"> {{Session::get('error')}}</p>
                        @endif
                        @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                        @endif
                    </div>
                    <div class="form-group my-1">
                        <label for="password" class="mb-1 form-control-placeholder">Mot de passe<strong
                                style="color:#ff0000;">*</strong></label>
                        <input type="password" name="password" value="{{ old('password') }}"
                            class="form-control input_inscription" placeholder="password" id="password" required />
                        @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="d-flex justify-content-center">
                        <input id="connexion" type="submit" name="next" class=" my-2 btn btn_connection  "
                            value="S'identifier" />
                    </div>


                </form>


        </div>
    </div>
</div>
@endsection
@endguest