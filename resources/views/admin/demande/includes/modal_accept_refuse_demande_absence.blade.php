  <div class="modal fade " id="acceptdemandabsence{{ $attente->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog   shadow p-3 lg-body  rounded">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Acceptation du
                            demande de absence "{{$attente->object}}"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('demandeabsence.accept',$attente->id) }}" class="mt-5"
                        id="msform_facture" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p class="text-muted">{{$attente->description}}</p>
                            <p>Voulez vous continuer <span style="color:green;"> ?</span></p>
                        </div>
                        <div class="modal-footer  justify-content-center">
                            <button type="button" class="btn btn-outline-primary"
                                data-bs-dismiss="modal">Non,
                                j'annule</button>
                            <button type="submit" class="btn btn-outline-success">Oui, j'accepte
                                la
                                demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade " id="refusdemandabsence{{ $attente->id }}" aria-hidden="true"
            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog   shadow p-3 lg-body  rounded">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Refus du
                            demande d' absence "{{$attente->object}}"</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="{{ route('demandeabsence.refus',$attente->id) }}" class="mt-5"
                        id="msform_facture" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p class="text-muted">{{$attente->description}}</p>
                            <p>Voulez vous continuer <span style="color:red;"> ?</span></p>
                        </div>
                        <div class="modal-footer  justify-content-center">
                            <button type="button" class="btn btn-outline-primary"
                                data-bs-dismiss="modal">Non,
                                j'annule</button>
                            <button type="submit" class="btn btn-outline-success">Oui, je refuse
                                la
                                demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
