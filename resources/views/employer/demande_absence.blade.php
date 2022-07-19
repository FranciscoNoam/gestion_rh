@extends('layouts.header')
@section('title')OIG-RH/ Demande d'absence
@endsection
@section('content')

<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h3 class="text-center " style="color:#198754;">Demande d'absence</h3>

        </div>
    </div>

    <div class="row ">

        <div class="col-md-4">
            <div class="shadow p-3 bg-body  rounded">
                <h4 class="text-center">Formulaire</h4>
                <form action="{{route('demandeabsence.store')}}" class="formulaire_new mt-5" id="msform_facture"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="object" class="mb-1 form-control-placeholder">Object d'absence<strong
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
                                    d'absence<strong style="color:#ff0000;">*</strong></label>
                                <input type="date" name="date_debut" class="form-control input_inscription"
                                    id="date_debut" required />
                                @error('date_debut')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="date_fin" class="mb-1 form-control-placeholder">Date fin d'absence<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="date" name="date_fin" class="form-control input_inscription" id="date_fin"
                                    required />
                                @error('date_fin')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="hour_debut" class="mb-1 form-control-placeholder">Heure début
                                    d'absence<strong style="color:#ff0000;">*</strong></label>
                                <input type="time" name="hour_debut" class="form-control input_inscription"
                                    id="hour_debut" required />
                                @error('hour_debut')
                                <span style="color:#ff0000;"> {{$message}} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group my-1">
                                <label for="hour_fin" class="mb-1 form-control-placeholder">Heure fin d'absence<strong
                                        style="color:#ff0000;">*</strong></label>
                                <input type="time" name="hour_fin" class="form-control input_inscription" id="hour_fin"
                                    required />
                                @error('hour_fin')
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
                        <button type="submit" name="next" class=" my-2 btn btn-success nouveau_admin ">Créer</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8" style="max-height: 800px; overflow-x: auto; overflow-y: 800px;">
            <div class="shadow p-3 bg-body  rounded">
                <h4 class="text-center">Liste</h4>
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
                            <th scope="col" colspan="2" class="text-center">#</th>
                            <th scope="col">Date/Heure</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($demande_absence)>0)
                        @foreach ($demande_absence as $demand)
                        {{-- {{ dd($demand) }} --}}

                        <div class="modal fade " id="dropDatapost{{ $demand->id }}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">

                            <div class="modal-dialog   shadow p-3 lg-body  rounded">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression du
                                            demande d'absence "{{$demand->object}}"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('demandeabsence.destroy',$demand->id) }}"
                                        class="formulaire_new mt-5" id="msform_facture" method="GET"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <p>Voulez vous vraiment rétiré cette information crusial? Cela est
                                                irréversible. cette information sera
                                                retiré dans la vos liste de demande d'absence et de celle de
                                                l'administration</p>
                                            <p>Voulez vous continuer <span style="color:red;"> ?</span></p>
                                        </div>
                                        <div class="modal-footer  justify-content-center">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non,
                                                j'annule</button>
                                            <button type="submit" class="btn btn-success">Oui, je le
                                                veux</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade " id="NewDatapost{{ $demand->id }}" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog   shadow p-3 lg-body  rounded">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modification du demande d'absence "{{ $demand->object }}"
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('demandeabsence.update',$demand->id) }}"
                                        class="formulaire_new mt-5" id="msform_facture" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="object" class="mb-1 form-control-placeholder">Object
                                                            d'absence<strong style="color:#ff0000;">*</strong></label>
                                                        <input type="text" name="object"
                                                            class="form-control input_inscription"
                                                            value="{{ $demand->object }}" placeholder="Object"
                                                            id="object" required />
                                                        @error('object')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="date_debut"
                                                            class="mb-1 form-control-placeholder">Date début
                                                            d'absence<strong style="color:#ff0000;">*</strong></label>
                                                        <input type="date" name="date_debut"
                                                            class="form-control input_inscription"
                                                            value="{{ $demand->date_debut }}" id="date_debut"
                                                            required />
                                                        @error('date_debut')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="date_fin" class="mb-1 form-control-placeholder">Date
                                                            fin d'absence<strong
                                                                style="color:#ff0000;">*</strong></label>
                                                        <input type="date" name="date_fin"
                                                            class="form-control input_inscription"
                                                            value="{{ $demand->date_fin }}" id="date_fin" required />
                                                        @error('date_fin')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="hour_debut"
                                                            class="mb-1 form-control-placeholder">Heure début
                                                            d'absence<strong style="color:#ff0000;">*</strong></label>
                                                        <input type="time" name="hour_debut"
                                                            class="form-control input_inscription"
                                                            value="{{ $demand->hour_debut }}" id="hour_debut"
                                                            required />
                                                        @error('hour_debut')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group my-1">
                                                        <label for="hour_fin"
                                                            class="mb-1 form-control-placeholder">Heure fin
                                                            d'absence<strong style="color:#ff0000;">*</strong></label>
                                                        <input type="time" name="hour_fin"
                                                            class="form-control input_inscription" id="hour_fin"
                                                            value="{{ $demand->hour_fin }}" required />
                                                        @error('hour_fin')
                                                        <span style="color:#ff0000;"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control" id="description"
                                                    rows="4">{{ $demand->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-success">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <tr>
                            <td> <a data-bs-toggle="modal" href="#dropDatapost{{ $demand->id }}" role="button"
                                    class="btn btn-link" style="color:red;"><i class="material-icons">&#xE872;</i></a>
                            </td>
                            <td> <a data-bs-toggle="modal" href="#NewDatapost{{ $demand->id }}" role="button"
                                    class="btn btn-link" style="color:green;"><i class="material-icons">&#xE254;</i></a>
                            </td>
                            <td>
                                <div>
                                    <h6>date: <span class="text-muted">{{$demand->date_debut}}</span> à <span class="text-muted">{{$demand->date_fin }}</span></h6>
                                    <p>heure: <span class="text-muted">{{$demand->hour_debut}}</span> à <span class="text-muted">{{$demand->hour_fin }}</span></p>
                                </div>

                            </td>
                            <td>
                                <h6>{{ $demand->object }}</h6>
                                <p>{{ $demand->description }}</p>
                            </td>
                            <td>
                                @if ($demand->validation==false && $demand->refus==false)
                                <div
                                    style="background-color: rgb(102, 90, 65); border-radius: 10px; text-align: center;color: white">
                                    En attente</div>
                                @elseif($demand->refus==true && $demand->validation==false)
                                <div
                                    style="background-color: red; border-radius: 10px; text-align: center;color: white">
                                    Refusé</div>
                                @elseif( $demand->validation==true && $demand->refus==false)
                                <div
                                    style="background-color: green; border-radius: 10px; text-align: center;color: white">
                                    Accepté</div>
                                @endif

                            </td>
                        </tr>

                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center" style="color:red;">Aucun Résultat</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
