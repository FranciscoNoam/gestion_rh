<div class="modal fade " id="dropDatapost{{ $demand->id }}" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">

    <div class="modal-dialog   shadow p-3 lg-body  rounded">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression du
                    demande de conger "{{$demand->object}}"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ route('demandeconger.destroy',$demand->id) }}"
                class="formulaire_new mt-5" id="msform_facture" method="GET"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p>Voulez vous vraiment rétiré cette information crusial? Cela est
                        irréversible. cette information sera
                        retiré dans la vos liste de demande de conger et de celle de
                        l'administration</p>
                    <p>Voulez vous continuer <span style="color:red;"> ?</span></p>
                </div>
                <div class="modal-footer  justify-content-center">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Non,
                        j'annule</button>
                    <button type="submit" class="btn btn-outline-success">Oui, je le
                        veux</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade " id="NewDatapost{{ $demand->id }}" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog   shadow p-3 lg-body  rounded">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification du demande de conger
                    "{{ $demand->object }}"
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ route('demandeconger.update',$demand->id) }}"
                class="formulaire_new mt-5" id="msform_facture" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="object" class="mb-1 form-control-placeholder">Object
                                    d'absence<strong style="color:#ff0000;">*</strong></label>
                                <input type="text" name="object"
                                    class="form-control input_inscription"
                                    value="{{ $demand->object }}" placeholder="Object"
                                    id="object" required />
                                @error('object')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="date_debut"
                                    class="mb-1 form-control-placeholder">Date début
                                    d'absence<strong style="color:#ff0000;">*</strong></label>
                                <input type="date" name="date_debut"
                                    class="form-control input_inscription date_debut"
                                    value="{{ $demand->date_debut }}" id="date_debut"
                                    required />
                                @error('date_debut')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="date_fin"
                                    class="mb-1 form-control-placeholder ">Date
                                    fin d'absence<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="date" name="date_fin"
                                    class="form-control input_inscription date_fin"
                                    value="{{ $demand->date_fin }}" id="date_fin" required />
                                @error('date_fin')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description"
                            rows="4">{{ $demand->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-primary"
                        data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-outline-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
