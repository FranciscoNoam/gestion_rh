@extends('layouts.connexion.header')

@section('login_user')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="shadow p-3 bg-body  rounded">
            <div class="d-flex justify-content-center align-center">
                <img src="{{ asset('logo/zaha.jpg') }}" width="80" height="80" class="d-inline-block align-text-top"
                    alt="" srcset="">
            </div>
            <h4 class="text-center text-success">Inscription d'employer</h4>

                    <form action="{{route('nouveau.store')}}" class="formulaire_new mt-5" id="msform_facture"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="nom" class="mb-1 form-control-placeholder">Nom<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="text" name="nom" class="form-control input_inscription"
                                    placeholder="Nom" id="nom" required />
                                @error('nom')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="prenom" class="mb-1 form-control-placeholder">Prénom</label>
                                <input type="text" name="prenom" class="form-control input_inscription"
                                    placeholder="Prénom" id="prenom" />

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="email" class="mb-1 form-control-placeholder">Email<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="email" name="email" class="form-control input_inscription"
                                    placeholder="email" id="email" required />
                                @error('email')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="phone" class="mb-1 form-control-placeholder">Numéro du
                                    télephone</label>
                                <input type="text" name="phone" class="form-control input_inscription"
                                    placeholder="Phone" id="phone" />
                                @error('phone')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="cin" class="mb-1 form-control-placeholder">CIN<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="number" name="cin" class="form-control input_inscription"
                                    placeholder="cin" id="cin" required />
                                @error('cin')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="poste" class="mb-1 form-control-placeholder">poste<strong
                                        style="color:#ff0000;">*</strong></label>
                                        <select name="poste" id="poste" class="form-select"
                                        aria-label="Default select example">
                                        @foreach ($postes as $post)
                                        <option value="{{ $post->id }}">{{ $post->name }}</option>
                                        @endforeach
                                    </select>

                                @error('poste')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="email" class="mb-1 form-control-placeholder">Département<strong
                                        style="color:#ff0000;">*</strong></label>
                                <select name="departement_id" id="departement_id" class="form-select"
                                    aria-label="Default select example">
                                    @foreach ($departements as $dep)
                                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="nom" class="mb-1 form-control-placeholder">Sexe<strong
                                        style="color:#ff0000;">*</strong></label>
                                <select name="genre_id" name="genre_id" class="form-select"
                                    aria-label="Default select example">
                                    @foreach ($genres as $ge)
                                    <option value="{{ $ge->id }}">{{ $ge->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="nom" class="mb-1 form-control-placeholder">Naissances<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="date" name="naissance" class="form-control input_inscription"
                                    id="naissance" required />
                                @error('naissance')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="debut_job" class="mb-1 form-control-placeholder">Début
                                    poste<strong style="color:#ff0000;">*</strong></label>
                                <input type="date" name="debut_job" class="form-control input_inscription"
                                    id="debut_job" required />
                                @error('debut_job')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="salaire" class="mb-1 form-control-placeholder">Adresse<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="text" name="adresse" class="form-control input_inscription"
                                    placeholder="adresse" id="adresse" required />
                                @error('adresse')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row d-flex  justify-content-center">

                        <div class="col-3">
                            <div class="form-group my-1">
                                <label for="salaire" class="mb-1 form-control-placeholder">Entrer votre salaire<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="number" name="salaire" class="form-control input_inscription"
                                    placeholder="salaire" id="salaire" required />
                                @error('salaire')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div> --}}


                          <div class="d-flex  justify-content-center">
                            <input type="submit" name="next" class=" my-2 btn btn-success btn_inscription "
                                value="S'inscrire" />
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
