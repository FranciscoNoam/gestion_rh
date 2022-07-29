<script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var tmp = document.getElementById("dernier_conger").value;
      if(tmp!=null && tmp!=""){
        document.getElementById("date_debut").setAttribute("min", tmp);
      }

         $('.create_conger').prop('disabled', true);
    });

    $('.formulaire_conger_emp input').keyup(function() {
        if ($('#date_debut').val().length > 1 && $('#description').val().length > 1 &&
            $('#date_fin').val().length > 1) {
                $('.create_conger').prop('disabled', false);
        } else {
            $('.create_conger').prop('disabled', true);
        }
    });

     $('.formulaire_conger_emp input').change(function() {
        if ($('#date_debut').val().length > 1 && $('#description').val().length > 1 &&
            $('#date_fin').val().length > 1) {
                $('.create_conger').prop('disabled', false);
        } else {
            $('.create_conger').prop('disabled', true);
        }
    });

    $('.formulaire_conger_emp textarea').keyup(function() {
        if ($('#date_debut').val().length > 1 && $('#description').val().length > 1 &&
            $('#date_fin').val().length > 1) {
                $('.create_conger').prop('disabled', false);
        } else {
            $('.create_conger').prop('disabled', true);
        }
    });

    $(document).on("keyup change", "#date_debut", function() {
        document.getElementById("date_fin").setAttribute("min", $(this).val());
    });

    /*=================================================================================================*/

    function HTML_demande_conger(listeAttente){
    var html='';
    const dernier_cong = "@php echo $dernier_conger->date_fin;@endphp"


    if (listeAttente.length > 0) {
            for (var id = 0; id < listeAttente.length; id += 1) {
                html+='<tr>';
                    html+='<td>';
                    if (listeAttente[id].validation==true || listeAttente[id].refus==true){
                    } else {
                    html+='    <button data-bs-toggle="modal" href="#dropDatapost'+listeAttente[id].id+'" role="button" class="btn btn-outline-danger" ><i class="material-icons">&#xE872;</i></button>&nbsp;';
                        html+=' <button data-bs-toggle="modal" href="#NewDatapost'+listeAttente[id].id+'" role="button"  class="btn btn-outline-success" ><i  class="material-icons">&#xE254;</i></button>';

                    }
                    html+='</td>';
                    html+='<td> <div><h6>date: <span class="text-muted">'+listeAttente[id].date_debut+'</span> à <span class="text-muted">'+listeAttente[id].date_fin+'</span></h6>';
                    html+='</div> </td>';
                    html+='<td><h6>'+listeAttente[id].object+' ( '+listeAttente[id].totale_day_conger+' jr)</h6>';
                    html+='  <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted">'+listeAttente[id].description+'</p> </td>';

                    html+='  <td>';
                    if (listeAttente[id].validation==false && listeAttente[id].refus==false){
                        html+='   <div  style="background-color: rgb(102, 90, 65); border-radius: 10px; text-align: center;color: white">en attente</div>';
                    } else if(listeAttente[id].refus==true && listeAttente[id].validation==false){
                        html+='    <div  style="background-color: red; border-radius: 10px; text-align: center;color: white"> refusé</div>';
                    } else if( listeAttente[id].validation==true && listeAttente[id].refus==false) {
                        html+='  <div  style="background-color: green; border-radius: 10px; text-align: center;color: white"> accepté</div>';
                        }

                    html+=' </td>';


            html+='</tr>';

            }
        } else {
            html += '<tr><td colspan="4" class="text-center" style="color:red;">Aucun Résultat</td></tr>';
        }
        return html;
    }

    function getDataRequetTrie(value,col_trie) {
        var dataValiny = {
            data_value:value
            ,colone: col_trie
            , debut_aff: @php echo $pagination["debut_aff"];@endphp
        };


             @php if (isset($search_month)) {  @endphp
            dataValiny = {
                data_value: value
                ,colone: col_trie
                , debut_aff: @php echo $pagination["debut_aff"];@endphp
                , search_month: "@php echo $search_month; @endphp"
            };
            @php }   @endphp

        return dataValiny;
    }

    function start_request(dataValue){
    $.ajax({
            method: "GET"
            , url: "{{route('demandeconger.trie.emp')}}"
            , data: dataValue
            , dataType: "html"
            , success: function(response) {
                var apl = JSON.parse(response);

                $('#list_data_trie_conger_emp').empty().append(HTML_demande_conger(apl['demande_conger']));

            }
            , error: function(error) {
                console.log(error)
            }
        });
}

// ============================================================
$(".motif_conger_trie").on('click', function(e) {

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

$('.date_debut_conger_trie')
    .find(".icon_trie")
    .removeClass("text-primary")
    .removeClass("fa-arrow-up")
    .removeClass("color-text-trie")
    .addClass("fa-arrow-down");

    $('.name_emp_conger_trie')
    .find(".icon_trie")
    .removeClass("text-primary")
    .removeClass("fa-arrow-up")
    .removeClass("color-text-trie")
    .addClass("fa-arrow-down");

if ($(".motif_conger_trie").val() == 0) {
    $(".motif_conger_trie").val(1);
} else {
    $(".motif_conger_trie").val(0);
}
var valiny = $(".motif_conger_trie").val();

    var dataValue = getDataRequetTrie(valiny,"MOTIF_CONGER");
  start_request(dataValue);

});

$(".date_debut_conger_trie").on('click', function(e) {

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

$('.motif_conger_trie')
    .find(".icon_trie")
    .removeClass("text-primary")
    .removeClass("fa-arrow-up")
    .removeClass("color-text-trie")
    .addClass("fa-arrow-down");

    $('.name_emp_conger_trie')
    .find(".icon_trie")
    .removeClass("text-primary")
    .removeClass("fa-arrow-up")
    .removeClass("color-text-trie")
    .addClass("fa-arrow-down");

if ($(".date_debut_conger_trie").val() == 0) {
    $(".date_debut_conger_trie").val(1);
} else {
    $(".date_debut_conger_trie").val(0);
}
var valiny = $(".date_debut_conger_trie").val();
    var dataValue = getDataRequetTrie(valiny,"DATE_DEBUT_CONGER");
    start_request(dataValue);

});


</script>
