<table class="table  table-hover table-bordered">
    <thead>
        <tr>
            <td>Motif &nbsp; <button class="btn btn_creer_trie motif_conger_trie" value="0"><i
                        class="fa icon_trie fa-arrow-down"></i></button>
            </td>
            <td>Description </td>
            <td scope="col">Duré du conger &nbsp; <button class="btn btn_creer_trie date_debut_conger_trie" value="0"><i
                        class="fa icon_trie fa-arrow-down"></i></button></td>
            <td scope="col">Totale</td>
            <td scope="col">Employer &nbsp; <button class="btn btn_creer_trie name_emp_conger_trie" value="0"><i
                        class="fa icon_trie fa-arrow-down"></i></button>
            </td>

        </tr>
    </thead>
    <tbody id="list_data_trie_conger_refuser">

        @if (count($demande_conger_refuser)>0)
        @foreach ($demande_conger_refuser as $refuser)
        <tr>
            <th><i class="fa fa-xmark text-danger"></i>&nbsp; {{ $refuser->object }} </th>
            <td>
                <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted"> {{$refuser->description}}</p>
            </td>
            <td>
                <h6>date: <span class="text-muted">{{ $refuser->date_debut }}</span> à <span class="text-muted">{{
                        $refuser->date_fin }}</span></h6>
            </td>
            <td> {{ $refuser->totale_day_conger }} jr(s)
            <td>
                <div>
                    <h6>{{ $refuser->name." ".$refuser->username }}</h6>
                    <p><a href="#">{{ $refuser->email }}</a> / {{ $refuser->phone }}</p>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="5" class="text-center" style="color:red;">Aucun Résultat</td>
        </tr>
        @endif


    </tbody>
</table>