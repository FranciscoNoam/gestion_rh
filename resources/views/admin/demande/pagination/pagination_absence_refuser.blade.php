<span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">


    @if(isset($search_name))
    <a href="{{route('demandeabsence.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
        rétiré le filtre</a>
        @elseif(isset($search_month))
        <a href="{{route('demandeabsence.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
            rétiré le filtre</a>
    @elseif($pagination_refuser["debut_aff"]>1)
    <a href="{{route('demandeabsence.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
        rétiré le filtre</a>
    @endif


    <span style="position: relative; bottom: -0.2rem; ">
        {{$pagination_refuser['debut_aff']."-".$pagination_refuser['fin_aff']." sur
        ".$pagination_refuser['totale_pagination']}}
    </span>

    {{-- =============== condition pagination_attente ==================== --}}
    @if ($pagination_refuser["nb_limit"] >= $pagination_refuser["totale_pagination"])

    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-left'></i></a>
    <a href="#" role="button" class="mx-1 text-muted"style="  color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>


    {{-- ======================= condition pagination_attente=================== --}}

    @elseif (($pagination_refuser["debut_aff"]+$pagination_refuser["nb_limit"]) > $pagination_refuser["totale_pagination"])

    @if(isset($search_name))

     <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser',$search_name] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>

 @elseif(issset($search_month))

      <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser',$search_month] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>

    @else

    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser'] ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>

    @endif

    <a href="#"role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i  class='fa fa-angle-right'></i></a>

    {{-- =============== condition pagination_attente ==================== --}}
    @elseif ($pagination_refuser["debut_aff"] == 1)

<a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-left'></i></a>


    @if(isset($search_name))
    {{-- -------- --}}
   <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]+ $pagination_refuser["nb_limit"]),'&refuser',$search_name ]) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

 @elseif(issset($search_month))

 <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]+ $pagination_refuser["nb_limit"]),'&refuser',$search_month ]) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]+ $pagination_refuser["nb_limit"]),'&refuser' ]) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


    @endif

    {{-- =============== condition pagination_attente ==================== --}}
    @elseif ($pagination_refuser["debut_aff"] == $pagination_refuser["fin_aff"] || $pagination_refuser["debut_aff"]>
    $pagination_refuser["fin_aff"])


    @if(isset($search_name))
    {{-- -------- --}}
 <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser',$search_name] ) }}"
        role="button" class="mx-1"> <i class='fa fa-angle-left'></i></a>

 @elseif(issset($search_month))

 <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser',$search_month] ) }}"
        role="button" class="mx-1"> <i class='fa fa-angle-left'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"] ,($pagination_refuser["debut_aff"]- $pagination_refuser["nb_limit"]),'&refuser'] ) }}"
        role="button" class="mx-1"> <i class='fa fa-angle-left'></i></a>

    @endif

    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i class='fa fa-angle-right'></i></a>

    {{-- =============== condition pagination_attente ==================== --}}

    @elseif (($pagination_refuser["debut_aff"]+$pagination_refuser["nb_limit"]) == $pagination_refuser["totale_pagination"] &&  $pagination_refuser["debut_aff"]>1)


    @if(isset($search_name))
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser',$search_name ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser',$search_name ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


 @elseif(issset($search_month))

    <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser',$search_month ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser',$search_month ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>
    @endif
    {{-- -------- --}}


    {{-- =============== condition pagination_attente ==================== --}}

    @else

    @if(isset($search_name))
    {{-- -------- --}}
   <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser',$search_name ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.filtre',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser',$search_name ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


 @elseif(issset($search_month))

    <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser',$search_month ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.month',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser',$search_month ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] - $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeabsence.index',[$pagination_attente["debut_aff"],$pagination_accepter["debut_aff"],($pagination_refuser["debut_aff"] + $pagination_refuser["nb_limit"]),'&refuser' ] ) }}"
        role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>
    @endif
    {{-- -------- --}}

    @endif
    {{-- fin pagination_attente --}}

</span>
