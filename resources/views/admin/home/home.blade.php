@extends('layouts.header')
@section('title')ASA-RH/Employers
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

                        <div class="modal fade" id="staticBackdrop{{ $emp->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-lg shadow p-3 bg-body  rounded">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                     
                                        <div class=" row">
                                            <div class="col"></div>
                                            <div class="col-5  justify-content-center align-center">
                                                <img src="{{ asset('logo/zaha.jpg') }}" width="80" height="80"
                                                    class="d-inline-block align-text-top" alt="" srcset="">
                                                <h4> Nouveau Employer</h4>
                                            </div>
                                            <div class="col"></div>

                                        </div>
                                        <form action="{{route('employe.store')}}" class="formulaire_new mt-5"
                                            id="msform_facture" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="nom"
                                                            class="mb-1 form-control-placeholder">Nom<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="text" name="nom"
                                                            class="form-control input_inscription" placeholder="Nom"
                                                            id="nom" required />
                                                        @error('nom')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="prenom"
                                                            class="mb-1 form-control-placeholder">Prénom</label>
                                                        <input type="text" name="prenom"
                                                            class="form-control input_inscription" placeholder="Prénom"
                                                            id="prenom" />

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="email"
                                                            class="mb-1 form-control-placeholder">Email<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="email" name="email"
                                                            class="form-control input_inscription" placeholder="email"
                                                            id="email" required />
                                                        @error('email')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="phone" class="mb-1 form-control-placeholder">Numéro
                                                            du
                                                            télephone</label>
                                                        <input type="text" name="phone"
                                                            class="form-control input_inscription" placeholder="Phone"
                                                            id="phone" />
                                                        @error('phone')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="cin"
                                                            class="mb-1 form-control-placeholder">CIN<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="number" name="cin"
                                                            class="form-control input_inscription" placeholder="cin"
                                                            id="cin" required />
                                                        @error('cin')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="poste"
                                                            class="mb-1 form-control-placeholder">poste<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="text" name="poste"
                                                            class="form-control input_inscription"
                                                            placeholder="Poste occupé" id="poste" />
                                                        @error('poste')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="email"
                                                            class="mb-1 form-control-placeholder">Département<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <select name="departement_id" id="departement_id"
                                                            class="form-select" aria-label="Default select example">
                                                            @foreach ($departements as $dep)
                                                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="nom"
                                                            class="mb-1 form-control-placeholder">Sexe<strong
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
                                                        <label for="nom"
                                                            class="mb-1 form-control-placeholder">Naissances<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="date" name="naissance"
                                                            class="form-control input_inscription" id="naissance"
                                                            required />
                                                        @error('naissance')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="debut_job"
                                                            class="mb-1 form-control-placeholder">Début
                                                            poste<strong style="color:#ff0000;">*</strong></label>
                                                        <input type="date" name="debut_job"
                                                            class="form-control input_inscription" id="debut_job"
                                                            required />
                                                        @error('debut_job')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="email" class="mb-1 form-control-placeholder">Fin
                                                            poste</label>
                                                        <input type="date" name="fin_job"
                                                            class="form-control input_inscription" id="fin_job" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="salaire"
                                                            class="mb-1 form-control-placeholder">Adresse<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="text" name="adresse"
                                                            class="form-control input_inscription" placeholder="adresse"
                                                            id="adresse" required />
                                                        @error('adresse')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="salaire"
                                                            class="mb-1 form-control-placeholder">Salaire<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="number" name="salaire"
                                                            class="form-control input_inscription" placeholder="salaire"
                                                            id="salaire" required />
                                                        @error('salaire')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="col"></div>
                                                <div class="col  justify-content-center align-center">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" name="next" class=" my-2 btn btn-success nouveau_admin " value="Créer" />
                                                      </div>

                                                   
                                                </div>
                                                <div class="col"></div>

                                            </div>


                                        </form>
                                    </div>
                                   
                                  </div>
                            </div>
                          </div>
                         
                        <tr>
                            <td> <button data-toggle="modal" data-target="#delete" type="button" class="btn btn-link"
                                    style="color:red;"><i class="material-icons">&#xE872;</i></button></td>
                            <td> <a data-bs-toggle="modal" href="#staticBackdrop{{ $emp->id }}" role="button"
                                    class="btn btn-link" style="color:green;"><i
                                        class="material-icons">&#xE254;</i></a></td>

                            <th>
                                {{ $emp->name." ".$emp->username }}
                            </th>
                            <td>{{ $emp->email }}</td>
                            <td>{{ $emp->phone }}</td>
                            <td>{{ $emp->cin }} </td>
                            <td>{{ $emp->departement_id }}</td>

                            <td>{{ $emp->poste }}</td>
                            <td>AR {{ number_format($emp->salaire,0,","," ") }} </td>
                            <td> {{ $emp->debut_job }}</td>
                            <td> @if ($emp->fin_job!=null)
                                {{ $emp->fin_job }}
                                @else
                                Aujourd'hui
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


            <div class="tab-pane fade " id="nav-valide" role="tabpanel" aria-labelledby="nav-valide-tab">

                <div class="row">
                    <div class="col-3"></div>
                    <div class="col">

                        <div class="shadow p-3 bg-body  rounded">
                            <div class=" row">
                                <div class="col"></div>
                                <div class="col-5  justify-content-center align-center">
                                    <img src="{{ asset('logo/zaha.jpg') }}" width="80" height="80"
                                        class="d-inline-block align-text-top" alt="" srcset="">
                                    <h4> Nouveau Employer</h4>
                                </div>
                                <div class="col"></div>

                            </div>
                            <form action="{{route('employe.store')}}" class="formulaire_new mt-5" id="msform_facture"
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
                                            <input type="text" name="poste" class="form-control input_inscription"
                                                placeholder="Poste occupé" id="poste" />
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
                                            <label for="email" class="mb-1 form-control-placeholder">Fin poste</label>
                                            <input type="date" name="fin_job" class="form-control input_inscription"
                                                id="fin_job" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
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
                                    <div class="col">
                                        <div class="form-group my-1">
                                            <label for="salaire" class="mb-1 form-control-placeholder">Salaire<strong
                                                    style="color:#ff0000;">*</strong></label>
                                            <input type="number" name="salaire" class="form-control input_inscription"
                                                placeholder="salaire" id="salaire" required />
                                            @error('salaire')
                                            <span style="color:#ff0000;"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class=" row">
                                    <div class="col"></div>
                                    <div class="col  justify-content-center align-center">
                                        <input type="submit" name="next" class=" my-2 btn btn-success nouveau_admin "
                                            value="Créer" />
                                    </div>
                                    <div class="col"></div>

                                </div>


                            </form>
                        </div>

                    </div>
                    <div class="col-3"></div>
                </div>

            </div>
        </div>
    </div>

</div>
</div>
@endsection