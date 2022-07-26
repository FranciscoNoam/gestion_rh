<span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">


    @if(isset($search_name))
    <a href="{{route('demandeabsence.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
        activer</a>

    @elseif($pagination_refuser["debut_aff"]>1)
    <a href="{{route('demandeabsence.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
        activer</a>
    @endif


    <span style="position: relative; bottom: -0.2rem; ">
        {{$pagination_refuser['debut_aff']."-".$pagination_refuser['fin_aff']." sur
        ".$pagination_refuser['totale_pagination']}}
    </span>

    {{-- =============== condition pagination_attente ==================== --}}
    @if ($pagination_refuser["nb_limit"] >= $pagination_refuser["totale_pagination"])

    @if(isset($search_name))
    {{-- -------- --}}
    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-left'></i></a>
    <a href="#" role="button" class="mx-1 text-muted"style="  color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i  class='fa fa-angle-left'></i></a>
    <a href="#"  role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>

    @endif


    {{-- ======================= condition pagination_attente=================== --}}

    @elseif (($pagination_refuser["debut_aff"]+$pagination_refuser["nb_limit"]) > $pagination_refuser["totale_pagination"])

    @if(isset($search_name))

    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] - $pagination_attente["nb_limit"]),$search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>

    @else

    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser'] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="#"role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i  class='fa fa-angle-right'></i></a>

    @endif

    {{-- =============== condition pagination_attente ==================== --}}
    @elseif ($pagination_refuser["debut_aff"] == 1)


    @if(isset($search_name))
    {{-- -------- --}}
    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] + $pagination_attente["nb_limit"]), $search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="#"role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser' ]) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


    @endif

    {{-- =============== condition pagination_attente ==================== --}}
    @elseif ($pagination_refuser["debut_aff"] == $pagination_refuser["fin_aff"] || $pagination_refuser["debut_aff"]>
    $pagination_refuser["fin_aff"])


    @if(isset($search_name))
    {{-- -------- --}}
    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] - $pagination_attente["nb_limit"]),
        $search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser'] ) }}"
        role="button" class="mx-1">
        <i class='fa fa-angle-left'></i></a>
    <a href="#"  role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>

    @endif

    {{-- =============== condition pagination_attente ==================== --}}

    @elseif (($pagination_refuser["debut_aff"]+$pagination_refuser["nb_limit"]) == $pagination_refuser["totale_pagination"] &&  $pagination_refuser["debut_aff"]>1)


    @if(isset($search_name))
    {{-- -------- --}}
    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] - $pagination_attente["nb_limit"]),
        $search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] + $pagination_attente["nb_limit"]),
        $search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>
    @endif
    {{-- -------- --}}


    {{-- =============== condition pagination_attente ==================== --}}

    @else

    @if(isset($search_name))
    {{-- -------- --}}
    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] - $pagination_attente["nb_limit"]),
        $search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('employe.filtre',[($pagination_attente["debut_aff"] + $pagination_attente["nb_limit"]),
        $search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.pagination',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>
    @endif
    {{-- -------- --}}

    @endif
    {{-- fin pagination_attente --}}

</span>
