@extends('layouts.header')
@section('title')ASA-RH/ Demande de conger
@endsection
@section('content')

<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-8">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                  <th scope="col" >debut conger</th>
                  <th scope="col" >fin conger</th>
                  <th scope="col">Object</th>
                  <th scope="col">Description</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><h6>01-01-2022</h6></td>
                  <td><h6>01-02-2022</h6></td>
                  <td><h6>Malade</h6></td>
                  <td> <p>Visite medical</p></td>
                  <td>
                    <div style="background-color: red; border-radius: 10px; text-align: center;color: white">
                      En attente</div>

                                 {{-- <div
                                    style="background-color: green; border-radius: 10px; text-align: center;color: white">
                                    Non Défini</div> --}}
                  </td>
                </tr>
              </tbody>
          </table>
    </div>
</div>

@endsection
