<table class="table  table-hover table-bordered">
    <thead>
        <tr>
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

        @if (count($demande_absence_accepter)>0)
        @foreach ($demande_absence_accepter as $accepter)
        <tr>
            <th><i class="fa fa-check text-success"></i>&nbsp; {{ $accepter->object }} </th>
            <td>
                <p class="text-muted"> {{$accepter->description}}</p>
            </td>
            <td>
                <h6>date: <span class="text-muted">{{ $accepter->date_debut }}</span> à <span
                        class="text-muted">{{ $accepter->date_fin }}</span></h6>
                        <p>heure: <span class="text-muted">{{ $accepter->hour_debut }}</span> à <span
                            class="text-muted">{{ $accepter->hour_fin }}</span></p>
                    </td>
            <td> {{ $accepter->totale_day_absence }} jr(s)
            <td>
                <div>
                    <h6>{{ $accepter->name." ".$accepter->username }}</h6>
                    <p><a href="#">{{ $accepter->email }}</a> / {{ $accepter->phone }}</p>
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
