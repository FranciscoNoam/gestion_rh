<table class="table  table-hover table-bordered">
    <thead>
        <tr>
            <td class="text-center">Action</td>
            <td>Motif &nbsp; <a href="#" style="color: blue"> <button
                        class="btn btn_creer_trie num_fact_trie" value="0"><i
                            class="fa icon_trie fa-arrow-down"></i></button>
            </td>
            <td>Description </td>
            <td scope="col">Duré du absence</td>
            <td scope="col">Totale &nbsp; <button class="btn btn_creer_trie nom_entiter_trie"
                    value="0"><i class="fa icon_trie fa-arrow-down"></i></button></td>
            <td scope="col">Employer &nbsp; <button
                    class="btn btn_creer_trie dte_reglement_trie" value="0"><i
                        class="fa icon_trie fa-arrow-down"></i></button>
            </td>

        </tr>
    </thead>
    <tbody id="list_data_trie_payer">
        @if (count($demande_absence_attente)>0)
        @foreach ($demande_absence_attente as $attente)
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
                            <button type="submit" class="btn btn-outline-primary">Oui, je refuse
                                la
                                demande</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <tr>
            <td class="justify-content-center d-flex align-self-center">
                <a data-bs-toggle="modal" href="#refusdemandabsence{{ $attente->id }}"
                    role="button" class="btn btn-outline-danger btn_admin"><i
                        class="fa fa-xmark"></i></a>
                &nbsp;&nbsp;
                <a data-bs-toggle="modal" href="#acceptdemandabsence{{ $attente->id }}"
                    role="button" class="btn btn_connection btn_admin"><i
                        class="fa  fa-check"></i></a>
            </td>

            <th>{{ $attente->object }} </th>
            <td>
                <p class="text-muted"> {{$attente->description}}</p>
            </td>
            <td>
                <h6>date: <span class="text-muted">{{ $attente->date_debut }}</span> à <span
                        class="text-muted">{{ $attente->date_fin }}</span></h6>
                        <p>heure: <span class="text-muted">{{ $attente->hour_debut }}</span> à <span
                            class="text-muted">{{ $attente->hour_fin }}</span></p>
                    </td>
            <td> {{ $attente->totale_day_absence }} jr(s)
            <td>
                <div>
                    <h6>{{ $attente->name." ".$attente->username }}</h6>
                    <p><a href="#">{{ $attente->email }}</a> / {{ $attente->phone }}</p>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6" class="text-center" style="color:red;">Aucun Résultat</td>
        </tr>
        @endif

    </tbody>
</table>
