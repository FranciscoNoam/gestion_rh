<span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">


    @if(isset($search_month))
    <a href="{{route('demandeconger.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
        rétiré le filtre</a>
    @elseif($pagination["debut_aff"]>1)
    <a href="{{route('demandeconger.index')}}" role="button" class="mx-3 filtre_activer"><i class='fa fa-close'></i>
        rétiré le filtre</a>
    @endif


    <span style="position: relative; bottom: -0.2rem; ">
        {{$pagination['debut_aff']."-".$pagination['fin_aff']." sur
        ".$pagination['totale_pagination']}}
    </span>

    {{-- =============== condition pagination ==================== --}}
    @if ($pagination["nb_limit"] >= $pagination["totale_pagination"])


    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i
            class='fa fa-angle-left'></i></a>
    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i
            class='fa fa-angle-right'></i></a>


    {{-- ======================= condition pagination=================== --}}

    @elseif (($pagination["debut_aff"]+$pagination["nb_limit"]) >=
    $pagination["totale_pagination"])

    @if(issset($search_month))
    {{-- --}}
    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] - $pagination["nb_limit"])] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-left'></i></a>

    @else

    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] - $pagination["nb_limit"])] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-left'></i></a>

    @endif

    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i
            class='fa fa-angle-right'></i></a>

    {{-- =============== condition pagination ==================== --}}
    @elseif ($pagination["debut_aff"] == 1)

    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i
            class='fa fa-angle-left'></i></a>

    @if(issset($search_month))
    {{-- --}}
    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] + $pagination["nb_limit"]) ]) }}" role="button"
        class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] + $pagination["nb_limit"]) ]) }}" role="button"
        class="mx-1"><i class='fa fa-angle-right'></i></a>

    @endif

    {{-- =============== condition pagination ==================== --}}
    @elseif ($pagination["debut_aff"] == $pagination["fin_aff"] || $pagination["debut_aff"]>
    $pagination["fin_aff"])


    @if(issset($search_month))
    {{-- --}}

    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] - $pagination["nb_limit"])] ) }}" role="button"
        class="mx-1">
        <i class='fa fa-angle-left'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] - $pagination["nb_limit"])] ) }}" role="button"
        class="mx-1">
        <i class='fa fa-angle-left'></i></a>

    @endif

    <a href="#" role="button" class="mx-1 text-muted" style=" color:black; pointer-events: none;cursor: default;"><i
            class='fa fa-angle-right'></i></a>

    {{-- =============== condition pagination ==================== --}}

    @elseif (($pagination["debut_aff"]+$pagination["nb_limit"]) == $pagination["totale_pagination"] &&
    $pagination["debut_aff"]>1)


    @if(issset($search_month))
    {{-- --}}
    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] - $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] + $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-right'></i></a>

    @else
    {{-- -------- --}}
    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] - $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] + $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-right'></i></a>
    @endif
    {{-- -------- --}}


    {{-- =============== condition pagination ==================== --}}

    @else

    @if(issset($search_month))
    {{-- --}}
    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] - $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeconger.month',[($pagination[" debut_aff"] + $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-right'></i></a>


    @else
    {{-- -------- --}}
    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] - $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-left'></i></a>
    <a href="{{ route('demandeconger.index',[($pagination[" debut_aff"] + $pagination["nb_limit"]) ] ) }}" role="button"
        class="mx-1"><i class='fa fa-angle-right'></i></a>
    @endif
    {{-- -------- --}}

    @endif
    {{-- fin pagination --}}

</span>
