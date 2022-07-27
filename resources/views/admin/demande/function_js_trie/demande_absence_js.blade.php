{{-- <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
    function HTML_demande_absence_attente(listeAttente){
    var html='';
    if (listeAttente.length > 0) {
            for (var id = 0; id < listeAttente.length; id += 1) {
                html+='<tr>';
                
             html+=' <td class="justify-content-center d-flex align-self-center"><a data-bs-toggle="modal" href="#refusdemandabsence'+listeAttente[id].id+'"';
            html+=' role="button" class="btn btn-outline-danger btn_admin"><i class="fa fa-xmark"></i></a>&nbsp;&nbsp;<a data-bs-toggle="modal" href="#acceptdemandabsence'+listeAttente[id].id+'"';
            html+='  role="button" class="btn btn_connection btn_admin"><i class="fa  fa-check"></i></a> </td>';
            html+='<th>'+listeAttente[id].object+'</th>';
            html+='<td> <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted"> '+listeAttente[id].description+'</p></td>';
            html+='<td> <h6>date: <span class="text-muted">'+listeAttente[id].date_debut+'</span> à <span class="text-muted">'+listeAttente[id].date_fin+'</span></h6>';
            html+=' <p>heure: <span class="text-muted">'+listeAttente[id].hour_debut+'</span> à <span class="text-muted">'+listeAttente[id].hour_fin+'</span></p>   </td>';
            html+=' <td> '+listeAttente[id].totale_day_absence+' jr(s)';
            html+=' <td> <div> <h6>'+listeAttente[id].name+' '+listeAttente[id].username+'</h6> <p><a href="#">'+listeAttente[id].email+'</a> / '+listeAttente[id].phone+'</p>';
            html+='  </div> </td>';
            
            html+='</tr>';

            }
        } else {
            html += '<tr><td colspan="6" class="text-center" style="color:red;">Aucun Résultat</td></tr>';
        }
        return html;
}

 function HTML_demande_absence_accepter(listeAccepter){
    var html='';
    if (listeAccepter.length > 0) {
            for (var id = 0; id < listeAccepter.length; id += 1) {
                html+='<tr>';
                
            html+='<th><i class="fa fa-check text-success"></i>&nbsp; '+listeAccepter[id].object+'</th>';
            html+='<td> <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted"> '+listeAccepter[id].description+'</p></td>';
            html+='<td> <h6>date: <span class="text-muted">'+listeAccepter[id].date_debut+'</span> à <span class="text-muted">'+listeAccepter[id].date_fin+'</span></h6>';
            html+=' <p>heure: <span class="text-muted">'+listeAccepter[id].hour_debut+'</span> à <span class="text-muted">'+listeAccepter[id].hour_fin+'</span></p>   </td>';
            html+=' <td> '+listeAccepter[id].totale_day_absence+' jr(s)';
            html+=' <td> <div> <h6>'+listeAccepter[id].name+' '+listeAccepter[id].username+'</h6> <p><a href="#">'+listeAccepter[id].email+'</a> / '+listeAccepter[id].phone+'</p>';
            html+='  </div> </td>';
            
            html+='</tr>';

            }
        } else {
            html += '<tr><td colspan="5" class="text-center" style="color:red;">Aucun Résultat</td></tr>';
        }
        return html;
}

 function HTML_demande_absence_refuser(listeRefuser){
    var html='';
    if (listeRefuser.length > 0) {
            for (var id = 0; id < listeRefuser.length; id += 1) {
                html+='<tr>';
                
            html+='<th><i class="fa fa-xmark text-danger"></i>&nbsp; '+listeRefuser[id].object+'</th>';
            html+='<td> <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted"> '+listeRefuser[id].description+'</p></td>';
            html+='<td> <h6>date: <span class="text-muted">'+listeRefuser[id].date_debut+'</span> à <span class="text-muted">'+listeRefuser[id].date_fin+'</span></h6>';
            html+=' <p>heure: <span class="text-muted">'+listeRefuser[id].hour_debut+'</span> à <span class="text-muted">'+listeRefuser[id].hour_fin+'</span></p>   </td>';
            html+=' <td> '+listeRefuser[id].totale_day_absence+' jr(s)';
            html+=' <td> <div> <h6>'+listeRefuser[id].name+' '+listeRefuser[id].username+'</h6> <p><a href="#">'+listeRefuser[id].email+'</a> / '+listeRefuser[id].phone+'</p>';
            html+='  </div> </td>';
            
            html+='</tr>';

            }
        } else {
            html += '<tr><td colspan="5" class="text-center" style="color:red;">Aucun Résultat</td></tr>';
        }
        return html;
}
  /*  function getDataEmployer(response) {
        var valiny = JSON.parse(response);
            var employe = valiny["employes"];
           var html = HTML_employer(employe);

    } */

    function getDataRequetTrie(value,col_trie) {
        var dataValiny = {
            data_value:value
            ,colone: col_trie
            , debut_aff_attente: @php echo $pagination_attente["debut_aff"];@endphp
            , debut_aff_accepter: @php echo $pagination_accepter["debut_aff"];@endphp
            , debut_aff_refuser: @php echo $pagination_refuser["debut_aff"];@endphp
        };
        @php if (isset($search_name)) {  @endphp
            dataValiny = {
                data_value: value
                ,colone: col_trie
                , debut_aff_attente: @php echo $pagination_attente["debut_aff"];@endphp
                , debut_aff_accepter: @php echo $pagination_accepter["debut_aff"];@endphp
                , debut_aff_refuser: @php echo $pagination_refuser["debut_aff"];@endphp
                , search_name: "@php echo $search_name; @endphp"
            };
            @php }   @endphp

             @php if (isset($search_month)) {  @endphp
            dataValiny = {
                data_value: value
                ,colone: col_trie
                , debut_aff_attente: @php echo $pagination_attente["debut_aff"];@endphp
                , debut_aff_accepter: @php echo $pagination_accepter["debut_aff"];@endphp
                , debut_aff_refuser: @php echo $pagination_refuser["debut_aff"];@endphp
                , search_month: "@php echo $search_month; @endphp"
            };
            @php }   @endphp

        return dataValiny;
    }
    // ===================== GET Request in Server =========================
function start_request(dataValue){
    $.ajax({
            method: "GET"
            , url: "{{route('demandeabsence.trie')}}"
            , data: dataValue
            , dataType: "html"
            , success: function(response) {
                var apl = JSON.parse(response);
                $('#list_data_trie_absence_attente').empty().append(HTML_demande_absence_attente(apl['demande_absence_attente']));
                $('#list_data_trie_absence_accepter').empty().append(HTML_demande_absence_accepter(apl['demande_absence_accepter']));
                $('#list_data_trie_absence_refuser').empty().append(HTML_demande_absence_refuser(apl['demande_absence_refuser']));
            }
            , error: function(error) {
                console.log(error)
            }
        });
}
// ============================================================
    $(".motif_absence_trie").on('click', function(e) {

        var valiny = $(this).val();
        $(this)
                .find(".icon_trie")
                .addClass("text-primary");
        if (
            $(this)
            .find(".icon_trie")
            .hasClass("fa-arrow-down")
        ) {
            $(this)
                .find(".icon_trie")
                .removeClass("fa-arrow-down")
                .addClass("fa-arrow-up");
        } else {
            $(this)
                .find(".icon_trie")
                .removeClass("fa-arrow-up")
                .addClass("fa-arrow-down");
        }

        $('.date_debut_absence_trie')
            .find(".icon_trie")
            .removeClass("text-primary")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie")
            .addClass("fa-arrow-down");

            $('.name_emp_absence_trie')
            .find(".icon_trie")
            .removeClass("text-primary")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie")
            .addClass("fa-arrow-down");

        if ($(".motif_absence_trie").val() == 0) {
            $(".motif_absence_trie").val(1);
        } else {
            $(".name_trie").val(0);
        }
            var dataValue = getDataRequetTrie(valiny,"MOTIF_ABSENCE");
          start_request(dataValue);

    });

    $(".date_debut_absence_trie").on('click', function(e) {
        var valiny = $(this).val();
        $(this)
            .find(".icon_trie")
            .addClass("text-primary");
        if (
            $(this)
            .find(".icon_trie")
            .hasClass("fa-arrow-down")
        ) {
            $(this)
                .find(".icon_trie")
                .removeClass("fa-arrow-down")
                .addClass("fa-arrow-up");
        } else {
            $(this)
                .find(".icon_trie")
                .removeClass("fa-arrow-up")
                .addClass("fa-arrow-down");
        }

        $('.motif_absence_trie')
            .find(".icon_trie")
            .removeClass("text-primary")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie")
            .addClass("fa-arrow-down");

            $('.name_emp_absence_trie')
            .find(".icon_trie")
            .removeClass("text-primary")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie")
            .addClass("fa-arrow-down");

        if ($(".date_debut_absence_trie").val() == 0) {
            $(".date_debut_absence_trie").val(1);
        } else {
            $(".date_debut_absence_trie").val(0);
        }
            var dataValue = getDataRequetTrie(valiny,"DATE_DEBUT_ABSENCE");
            start_request(dataValue);

    });

    $(".name_emp_absence_trie").on('click', function(e) {
        var valiny = $(this).val();
        $(this)
            .find(".icon_trie")
            .addClass("text-primary");
        if (
            $(this)
            .find(".icon_trie")
            .hasClass("fa-arrow-down")
        ) {
            $(this)
                .find(".icon_trie")
                .removeClass("fa-arrow-down")
                .addClass("fa-arrow-up");
        } else {
            $(this)
                .find(".icon_trie")
                .removeClass("fa-arrow-up")
                .addClass("fa-arrow-down");
        }

        $('.motif_absence_trie')
            .find(".icon_trie")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie text-primary")
            .addClass("fa-arrow-down");

            $('.date_debut_absence_trie')
            .find(".icon_trie")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie text-primary")
            .addClass("fa-arrow-down");

        if ($(".name_emp_absence_trie").val() == 0) {
            $(".name_emp_absence_trie").val(1);
        } else {
            $(".name_emp_absence_trie").val(0);
        }
            var dataValue = getDataRequetTrie(valiny,"NAME_EMP_ABSENCE");
            start_request(dataValue);

    });
</script>
