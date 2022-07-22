<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type="text/javascript">
    function HTML_employer(listeEmp){
    var html='';
    if (listeEmp.length > 0) {
            for (var id = 0; id < listeEmp.length; id += 1) {
                html+='<tr>';
                    html+=' <td class="justify-content-center d-flex align-self-center">';
                html+='<a data-bs-toggle="modal" href="#dropdataBoot'+listeEmp[id].id+'" role="button" class="btn btn-outline-danger"><i class="material-icons">&#xE872;</i></a>';
                html+=' &nbsp;&nbsp;  <a data-bs-toggle="modal" href="#staticBackdrop'+listeEmp[id].id+'" role="button"   class="btn btn-outline-success"><i class="material-icons">&#xE254;</i></a>';
                html+='</td><td>';
                html+='<div><h6>'+listeEmp[id].name+' '+listeEmp[id].username+'</h6> <p><a href="#">'+listeEmp[id].email+'</a> / '+listeEmp[id].phone+'</p> </div> </td>';
                html+='<td>'+listeEmp[id].name_genre+'</td>';
                html+='<td>'+listeEmp[id].cin+'</td>';
                html+='<td>'+listeEmp[id].name_departement+'</td>';
                html+='<td>'+listeEmp[id].name_poste+'</td>';
                var tmp = ""+listeEmp[id].salaire;
                html+=' <td>AR '+tmp.replace(/[^\dA-Z]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, " ").trim()+'</td>';
                html+='<td> '+listeEmp[id].debut_job+'</td><td>';
                        if (listeEmp[id].fin_job!=null){
                html+=' <div style="background-color: red; border-radius: 10px; text-align: center;color: white">'+listeEmp[id].fin_job+'</div>';
                } else{
                    html+='<div style="background-color: green; border-radius: 10px; text-align: center;color: white">  Non Défini</div>';
                }
                let dte = new Date();
                let mydte = new Date(""+listeEmp[id].naissance);
                html+='  </td> <td>'+listeEmp[id].naissance+' ('+(dte.getYear()-mydte.getYear())+' ans)</td>';
                html+='  <td>'+listeEmp[id].adresse+'</td></tr>';

            }
        } else {
            html += '<tr><td colspan="12" class="text-center" style="color:red;">Aucun Résultat</td></tr>';
        }
        return html;
}
    function getDataEmployer(response) {
        var valiny = JSON.parse(response);
            var employe = valiny["employes"];
           var html = HTML_employer(employe);


    }

    function getDataRequetTrie(value,col_trie) {
        var dataValiny = {
            data_value:value
            ,colone: col_trie
            , debut_aff: @php echo $pagination["debut_aff"];@endphp
        };
        @php if (isset($search_name)) {  @endphp
            dataValiny = {
                data_value: value
                ,colone: col_trie
                , debut_aff: @php echo $pagination["debut_aff"]; @endphp
                , search_name: "@php echo $search_name; @endphp"
            };
            @php }   @endphp

        return dataValiny;
    }

   /*   $(".name_trie").on('click', function(e) {
        if (
            $(".name_trie")
            .find(".icon_trie")
            .hasClass("fa-arrow-down")
        ) {
            $(".name_trie")
                .find(".icon_trie")
                .removeClass("fa-arrow-down")
                .addClass("fa-arrow-up");
        } else {
            $(".name_trie")
                .find(".icon_trie")
                .removeClass("fa-arrow-up")
                .addClass("fa-arrow-down");
        }

        $('.salaire_trie')
            .find(".icon_trie")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie")
            .addClass("fa-arrow-down");

            $('.debut_job_trie')
            .find(".icon_trie")
            .removeClass("fa-arrow-up")
            .removeClass("color-text-trie")
            .addClass("fa-arrow-down");
    }); */


    $(".name_trie").on('click', function(e) {
        var valiny = $(this).val();
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

        if ($(".name_trie").val() == 0) {
            $(".name_trie").val(1);
        } else {
            $(".name_trie").val(0);
        }

            // $('.icon_trie').remove();
            var dataValue = getDataRequetTrie(valiny,"NAME_EMP");

        $.ajax({
            method: "GET"
            , url: "{{route('employe.trie')}}"
            , data: dataValue
            , dataType: "html"
            , success: function(response) {
                var apl = JSON.parse(response);
                var resultat = HTML_employer(apl['employes']);
                $('#list_data_trie_employes').empty().append(resultat);
                    
            }
            , error: function(error) {
                console.log(error)
            }
        });
    });
</script>
