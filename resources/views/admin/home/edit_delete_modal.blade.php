<div class="modal fade " id="dropdataBoot{{ $emp->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">

    <div class="modal-dialog   shadow p-3 lg-body  rounded">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Suppression de "{{ $emp->name." ".$emp->username }}"</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <form  action="{{route('employe.destroy',$emp->id)}}" class="formulaire_new mt-5"
            id="msform_facture" method="GET" enctype="multipart/form-data">
@csrf
            <div class="modal-body">
                <p>Voulez vous vraiment rétiré cette information crusial? Cela est irréversible.</p>
                <p>Voulez vous continuer <span style="color:red;"> ?</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non, j'annule</button>
                <button type="submit" class="btn btn-success">Oui, je le veux</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop{{ $emp->id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg shadow p-3 bg-body  rounded">
        <div class="modal-content">
            <div class="modal-header">
              {{-- <h5 class="modal-title" id="exampleModalLabel">New message</h5> --}}
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class=" row">
                    <div class="col"></div>
                    <div class="col-5  justify-content-center align-center">
                        <img src="{{ asset('logo/zaha.jpg') }}" width="80" height="80"
                            class="d-inline-block align-text-top" alt="" srcset="">
                        <h4> Modification de "{{  $emp->name." ".$emp->username }}" </h4>
                    </div>
                    <div class="col"></div>

                </div>
                <form action="{{route('employe.update',$emp->id)}}" class="formulaire_new mt-5"
                    id="msform_facture" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="nom"
                                    class="mb-1 form-control-placeholder">Nom<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="text" name="nom" value="{{ $emp->name }}"
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
                                <input type="text" name="prenom" value="{{ $emp->username }}"
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
                                <input type="email" name="email" value="{{ $emp->email }}"
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
                                <input type="text" name="phone" value="{{ $emp->phone }}"
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
                                <input type="number" name="cin" value="{{ $emp->cin }}"
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
                                        <select name="poste" id="poste"
                                        class="form-select" aria-label="Default select example">
                                        <option value="{{ $emp->poste_id }}">{{ $emp->name_poste }}</option>

                                        @foreach ($postes as $post_up)
                                        @if($emp->poste_id!=$post_up->id)
                                        <option value="{{ $post_up->id }}">{{ $post_up->name }}</option>

                                        @endif
                                        @endforeach
                                    </select>
                                {{-- <input type="text" name="poste" value="{{ $emp->poste }}"
                                    class="form-control input_inscription"
                                    placeholder="Poste occupé" id="poste" /> --}}
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
                                    <option value="{{ $emp->departement_id }}">{{ $emp->name_departement }}</option>

                                    @foreach ($departements as $dep_up)
                                    @if($emp->genre_id!=$dep_up->id)
                                    <option value="{{ $dep_up->id }}">{{ $dep_up->name }}</option>

                                    @endif
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
                                    <option value="{{ $emp->genre_id }}">{{ $emp->name_genre }}</option>

                                    @foreach ($genres as $ge_up)
                                    @if($emp->genre_id!=$ge_up->id)
                                    <option value="{{ $ge_up->id }}">{{ $ge_up->name }}</option>

                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="nom"
                                    class="mb-1 form-control-placeholder">Naissances<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="date" name="naissance" value="{{ $emp->naissance }}"
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
                                <input type="date" name="debut_job" value="{{ $emp->debut_job }}"
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
                                    @if ($emp->fin_job!=null)
                                    <input type="date" name="fin_job" value="{{ $emp->fin_job }}"
                                    class="form-control input_inscription" id="fin_job" />
                                    @else
                                    <input type="date" name="fin_job"
                                    class="form-control input_inscription" id="fin_job" />
                                    @endif

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
                                    class="form-control input_inscription" placeholder="adresse" value="{{ $emp->adresse }}"
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
                                    class="form-control input_inscription" placeholder="salaire" value="{{ $emp->salaire }}"
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
