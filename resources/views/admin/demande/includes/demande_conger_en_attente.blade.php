<table class="table  table-hover table-bordered">
    <thead>
        <tr>
            <td class="text-center">Action</td>
               <td>Motif &nbsp; <button class="btn btn_creer_trie motif_conger_trie" value="0"><i class="fa icon_trie fa-arrow-down"></i></button>
            </td>
            <td >Description </td>
            <td scope="col">Duré du conger &nbsp; <button class="btn btn_creer_trie date_debut_conger_trie" value="0"><i class="fa icon_trie fa-arrow-down"></i></button></td>
            <td scope="col">Totale</td>
            <td scope="col">Employer &nbsp; <button class="btn btn_creer_trie name_emp_conger_trie" value="0"><i class="fa icon_trie fa-arrow-down"></i></button>
            </td>
        </tr>
    </thead>
    <tbody id="list_data_trie_conger_attente">

        @if (count($demande_conger_attente)>0)
        @foreach ($demande_conger_attente as $attente)

        @include('admin.demande.includes.modal_accept_refuse_demande_conger')

        <tr>
            <td class="justify-content-center d-flex align-self-center">
                <a data-bs-toggle="modal" href="#refusdemandconger{{ $attente->id }}"
                    role="button" class="btn btn-outline-danger btn_admin"><i
                        class="fa fa-xmark"></i></a>
                &nbsp;&nbsp;
                <a data-bs-toggle="modal" href="#acceptdemandconger{{ $attente->id }}"
                    role="button" class="btn btn-outline-success btn_admin"><i
                        class="fa  fa-check"></i></a>
            </td>

            <th>{{ $attente->object }} </th>
            <td>
                <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted"> {{$attente->description}}</p>
            </td>
            <td>
                <h6>date: <span class="text-muted">{{ $attente->date_debut }}</span> à <span
                        class="text-muted">{{ $attente->date_fin }}</span></h6>
            </td>
            <td> {{ $attente->totale_day_conger }} jr(s)
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
