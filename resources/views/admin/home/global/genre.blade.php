<div class="container">
    <div class="row justify-content-center">
        <div class="col-5">
            <div class="shadow p-3 bg-body  rounded">
                <form action="{{ route('genre.store') }}" class="formulaire_new" id="msform_facture" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h4> Nouveau</h4>
                    <div class="modal-body">
                        <div class="form-group my-1">
                            <label for="nom" class="mb-1 form-control-placeholder">Description<strong
                                    style="color:#ff0000;">*</strong></label>
                            <input type="text" name="nom" class="form-control input_inscription"
                                placeholder="Description" id="nom" />
                            @error('nom')
                            <span style="color:#ff0000;"> {{$message}} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="justify-content-center d-flex align-self-center">
                        <button type="submit" class="btn btn-outline-success">Créer</button>
                    </div>
                </form>
            </div>

        </div>

        <div class="col-5">
            <div class="shadow p-3 bg-body  rounded">
                <h4>Liste</h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <td scope="col"  class="text-center">Action</td>
                            <td scope="col">description</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($genres) > 0)
                        @foreach ($genres as $ge)
                        <div class="modal fade " id="dropDataGenre{{ $ge->id }}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">

                            <div class="modal-dialog   shadow p-3 lg-body  rounded">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression du genre "{{
                                            $ge->name}}"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('genre.destroy',$ge->id) }}" class="formulaire_new mt-5"
                                        id="msform_facture" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Voulez vous vraiment rétiré cette information crusial? Cela est
                                                irréversible. Tous les employers dans cette département sera
                                                retiré</p>
                                            <p>Voulez vous continuer <span style="color:red;"> ?</span></p>
                                        </div>
                                        <div class="modal-footer justify-content-center d-flex align-self-center">
                                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Non,
                                                j'annule</button>
                                            <button type="submit" class="btn btn-outline-success">Oui, je le
                                                veux</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- --}}
                        <div class="modal fade " id="NewDataGenre{{ $ge->id }}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog   shadow p-3 lg-body  rounded">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification du genre "{{
                                            $ge->name}}"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('genre.update',$ge->id) }}" class="formulaire_new mt-5"
                                        id="msform_facture" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group my-1">
                                                <label for="nom"
                                                    class="mb-1 form-control-placeholder">Description<strong
                                                        style="color:#ff0000;">*</strong></label>
                                                <input type="text" name="nom" class="form-control input_inscription"
                                                    value="{{ $ge->name }}" placeholder="Description" id="nom" />
                                                @error('nom')
                                                <span style="color:#ff0000;"> {{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center d-flex align-self-center">
                                            <button type="button" class="btn btn-outline-primary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-outline-success">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <tr>
                         <td class="justify-content-center d-flex align-self-center">
                            <a data-bs-toggle="modal" href="#dropDataGenre{{ $ge->id }}" role="button"
                                class="btn btn-outline-danger" ><i class="material-icons">&#xE872;</i></a>
                                &nbsp;&nbsp;
                                <a data-bs-toggle="modal" href="#NewDataGenre{{ $ge->id }}" role="button"
                                    class="btn btn-outline-success" ><i class="material-icons">&#xE254;</i></a>
                            </td>
                            <td> {{ $ge->name}} </td>

                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan="2" class="text-center" style="color:red;">Aucun Résultat</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
