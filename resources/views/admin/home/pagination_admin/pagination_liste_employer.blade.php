<div class="row mx-3 my-1 text-success">
    <div class="col">
        <span class="mt-0 d-flex justify-content-start text-center text-success" style="font-size: 20px;">Liste
            employer</span>
    </div>
    <div class="col">
        <div class="d-flex justify-content-end">
            <form action="{{ route('employe.filtre') }}" class="formulaire_new d-flex justify-content-end"
                id="msform_facture" method="GET" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input autocomplete="off" type="text" name="search_name" id="search_name" placeholder="Nom ou Prénom"
                    class="form-control-label me-2">
                <div class="text-end">
                    <button type="submit" class="btn btn-outline-success me-2">chercher</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col mx-2">

        {{-- pagination liste des employes --}}
        <h5>
            <span class="mt-0 d-flex justify-content-end text-center" style="font-size: 20px;">
                <span style="position: relative; bottom: -0.2rem; ">
                    {{$pagination['debut_aff']."-".$pagination['fin_aff']." sur ".$pagination['totale_pagination']}}
                </span>
                {{-- <a href="#" role="button" class="mx-1" style=" pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-left'></i></a>
                <a href="#" role="button" class="mx-1" style="  pointer-events: none;cursor: default;"><i
                        class="fa fa-angle-right"></i></a> --}}
                {{-- =============== condition pagination ==================== --}}
                @if ($pagination["nb_limit"] >= $pagination["totale_pagination"])

                @if(isset($search_name))
                {{-- -------- --}}
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] - $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-left'></i></a>
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] + $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1" style="  color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-right'></i></a>


                @else
                {{-- -------- --}}
                <a href="{{ route('home.index',[($pagination["debut_aff"] - $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-left'></i></a>
                <a href="{{ route('home.index',[($pagination["debut_aff"] + $pagination["nb_limit"]) ]) }}"
                    role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-right'></i></a>

                @endif


                {{-- ======================= condition pagination=================== --}}

                @elseif (($pagination["debut_aff"]+$pagination["nb_limit"]) > $pagination["totale_pagination"])

                @if(isset($search_name))

                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] - $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] + $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-right'></i></a>

                @else

                <a href="{{ route('home.index',[($pagination["debut_aff"] - $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('home.index',[($pagination["debut_aff"] + $pagination["nb_limit"]) ]) }}"
                    role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-right'></i></a>

                @endif

                {{-- =============== condition pagination ==================== --}}
                @elseif ($pagination["debut_aff"] == 1)


                @if(isset($search_name))
                {{-- -------- --}}
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] - $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-left'></i></a>
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] + $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

                @else
                {{-- -------- --}}
                <a href="{{ route('home.index',[($pagination["debut_aff"] - $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-left'></i></a>
                <a href="{{ route('home.index',[($pagination["debut_aff"] + $pagination["nb_limit"]) ]) }}"
                    role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


                @endif

                {{-- =============== condition pagination ==================== --}}
                @elseif ($pagination["debut_aff"] == $pagination["fin_aff"] || $pagination["debut_aff"]>
                $pagination["fin_aff"])


                @if(isset($search_name))
                {{-- -------- --}}
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] - $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] + $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-right'></i></a>

                @else
                {{-- -------- --}}
                <a href="{{ route('home.index',[($pagination["debut_aff"] - $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1">
                    <i class='fa fa-angle-left'></i></a>
                <a href="{{ route('home.index',[($pagination["debut_aff"] + $pagination["nb_limit"]) ]) }}"
                    role="button" class="mx-1" style=" color:black; pointer-events: none;cursor: default;"><i
                        class='fa fa-angle-right'></i></a>

                @endif

                {{-- =============== condition pagination ==================== --}}

                @elseif (($pagination["debut_aff"]+$pagination["nb_limit"]) == $pagination["totale_pagination"] &&
                $pagination["debut_aff"]>1)


                @if(isset($search_name))
                {{-- -------- --}}
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] - $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] + $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>

                @else
                {{-- -------- --}}
                <a href="{{ route('home.index',[($pagination["debut_aff"] - $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('home.index',[($pagination["debut_aff"] + $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>
                @endif
                {{-- -------- --}}


                {{-- =============== condition pagination ==================== --}}

                @else

                @if(isset($search_name))
                {{-- -------- --}}
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] - $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('employe.filtre',[($pagination["debut_aff"] + $pagination["nb_limit"]), $search_name]
                    ) }}" role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>


                @else
                {{-- -------- --}}
                <a href="{{ route('home.index',[($pagination["debut_aff"] - $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1"><i class='fa fa-angle-left'></i></a>
                <a href="{{ route('home.index',[($pagination["debut_aff"] + $pagination["nb_limit"])] ) }}"
                    role="button" class="mx-1"><i class='fa fa-angle-right'></i></a>
                @endif
                {{-- -------- --}}

                @endif
                {{-- fin pagination --}}

            </span>
        </h5>
    </div>
</div>