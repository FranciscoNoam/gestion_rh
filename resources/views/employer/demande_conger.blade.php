@extends('layouts.header')
@section('title') Demande de Conger
@endsection
@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h3 class="text-center " style="color:#198754;">Demande de conger: {{ " ".$reste_conger." jr restant en
                ".date('Y') }} </h3>

        </div>
    </div>

    <div class="row ">

        <div class="col-md-4">
            <div class="shadow p-3 bg-body  rounded">
                <h4 class="text-center">Formulaire</h4>
                <form action="{{route('demandeconger.store')}}" class="formulaire_conger_emp mt-5" id="msform_facture"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="object" class="mb-1 form-control-placeholder">Object de conger<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="text" name="object" class="form-control input_inscription"
                                    placeholder="Object" id="object" required />
                                @error('object')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="date_debut" class="mb-1 form-control-placeholder">Date début
                                    de conger<strong style="color:#ff0000;">*</strong></label>

                                <input type="date" name="date_debut" class="form-control input_inscription date_debut"
                                    id="date_debut" required />

                                @error('date_debut')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="date_fin" class="mb-1 form-control-placeholder">Date fin de conger<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="date" name="date_fin" class="form-control input_inscription date_fin"
                                    id="date_fin" required />
                                @error('date_fin')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="4"
                            placeholder="motif du conger"></textarea>
                    </div>

                    <div class="modal-footer  justify-content-center">
                        <button type="submit" name="next" class=" my-2 btn btn-success create_conger ">Créer</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8" style="max-height: 800px; overflow-x: auto; overflow-y: 800px;">
            <div class="shadow p-3 bg-body  rounded">

                <h5 class=" mx-0">
                    <div class="row mx-3 my-1 text-success">
                        <div class="col">
                            <span class="mt-0 d-flex justify-content-start text-center text-success"
                                style="font-size: 20px;">Liste</span>
                        </div>

                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <form action="{{ route('demandeconger.month.emp') }}"
                                    class="formulaire_new d-flex justify-content-end" id="msform_facture" method="GET"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="" class="form-control-label me-2">Mois</label>
                                    <input type="month" name="search_month" id="search_month" placeholder="employer"
                                        required class="form-control-input me-2">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn_connection me-2"><i
                                                class="fa fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">


                            @include('employer.pagination')


                        </div>
                    </div>
                </h5>

                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <td scope="col" class="text-center">#</td>
                            <td scope="col">Date &nbsp; <button class="btn btn_creer_trie date_debut_conger_trie" value="0"><i class="fa icon_trie fa-arrow-down"></i></button>
                            </td>
                            <td scope="col">Description &nbsp; <button class="btn btn_creer_trie motif_conger_trie" value="0"><i class="fa icon_trie fa-arrow-down"></i></button>
                            </td>
                            <td scope="col">Status</td>
                        </tr>
                    </thead>
                    <tbody  id="list_data_trie_conger_emp">
                          <input type="hidden" value="{{ $dernier_conger->date_fin }}" id="dernier_conger">
                        @if (count($demande_conger)>0)
                        @foreach ($demande_conger as $demand)

                        @include('employer.modal_edit_delete_conger')

                        <tr>

                            <td>

                                @if ($demand->validation==true || $demand->refus==true)
                                @else

                                <button data-bs-toggle="modal" href="#dropDatapost{{ $demand->id }}" role="button"
                                    class="btn btn-outline-danger" ><i class="material-icons">&#xE872;</i></button>&nbsp;
                                <button data-bs-toggle="modal" href="#NewDatapost{{ $demand->id }}" role="button"
                                    class="btn btn-outline-success" ><i  class="material-icons">&#xE254;</i></button>

                                @endif

                            </td>

                            <td>
                                <div>
                                    <h6>date: <span class="text-muted">{{$demand->date_debut}}</span> à <span
                                            class="text-muted">{{$demand->date_fin }}</span></h6>

                                </div>

                            </td>
                            <td>
                                <h6>{{ $demand->object ." ( ".$demand->totale_day_conger." jr)"}}</h6>
                                <p style="width: 30rem;" class="lh-sm-4 text-break  text-muted">{{ $demand->description
                                    }}</p>
                            </td>
                            <td>
                                @if ($demand->validation==false && $demand->refus==false)
                                <div
                                    style="background-color: rgb(102, 90, 65); border-radius: 10px; text-align: center;color: white">
                                    en attente</div>
                                @elseif($demand->refus==true && $demand->validation==false)
                                <div
                                    style="background-color: red; border-radius: 10px; text-align: center;color: white">
                                    refusé</div>
                                @elseif( $demand->validation==true && $demand->refus==false)
                                <div
                                    style="background-color: green; border-radius: 10px; text-align: center;color: white">
                                    accepté</div>
                                @endif

                            </td>
                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center" style="color:red;">Aucun Résultat</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('employer.function_js.demande_conger_js')

@endsection
