<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OIGASA</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styleGenerale.css')}}">
    <link rel="shortcut icon" href="{{  asset('logo/oig_violet.jpg') }}" type="image/x-icon">
</head>

<body>



    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-dark header_menu justify-content-text-center"
                    style="overflow-x: auto">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <div class="row">
                                <div class="col"> <img src="{{ asset('logo/oig_violet.jpg') }}" width="50" height="50"
                                        class="d-inline-block align-text-top" alt="" srcset=""></div>
                                <div class="col">
                                    <p>OIGASA </p>
                                    <p> <span style="color: yellow; font-family:bold">O</span>utils <span
                                            style="color: yellow; font-family:bold">I</span>nformatique pour la <span
                                            style="color: yellow; font-family:bold">G</span>estion de l'entreprise <span
                                            style="color: yellow; font-family:bold">ASA</span></p>
                                </div>
                            </div>

                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                {{-- <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">A propos</a>
                                </li> --}}

                            </ul>
                            <div class="d-flex">
                                <a href="{{ route('connection') }}"><button role="button"
                                        class=" me-2 btn btn-primary {{Route::currentRouteNamed('connection') ? 'active' : '' }}"
                                        aria-current="page">Se connecter</button></a>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class=" mt3 container-fluid content_body px-0 " style="padding-bottom: 1rem; padding-top: 4.5rem;">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="shadow p-3 bg-body  rounded">
                                <div class="d-flex justify-content-center align-center">
                                    <img src="{{ asset('logo/oig_violet.jpg') }}" width="80" height="80"
                                        class="d-inline-block align-text-top" alt="" srcset="">
                                </div>
                                <h4 class="text-center title">Nouveau Admin</h4>
                                <form action="{{route('admin.store.admin')}}" class="formulaire_new_admin mt-5"
                                    id="msform_facture" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group my-1">
                                        <label for="nom" class="mb-1 form-control-placeholder">Nom Complet<strong
                                                style="color:#ff0000;">*</strong></label>
                                        <input type="text" name="nom" class="form-control input_inscription"
                                            placeholder="Nom complet" id="nom" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="email" class="mb-1 form-control-placeholder">Email<strong
                                                style="color:#ff0000;">*</strong></label>
                                        <input type="email" name="email" class="form-control input_inscription"
                                            placeholder="email" id="email" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="new_password" class="mb-1 form-control-placeholder">Nouveau mot de
                                            passe<strong style="color:#ff0000;">*</strong></label>
                                        <input type="password" name="new_password"
                                            class="form-control input_inscription" placeholder="nouveau mot de passe"
                                            id="new_password" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="confirm_password" class="mb-1 form-control-placeholder">Confirmer
                                            Nouveau mot de passe<strong style="color:#ff0000;">*</strong></label>
                                        <input type="password" name="confirm_password"
                                            class="form-control input_inscription"
                                            placeholder="confirmer Nouveau mot de passe" id="confirm_password"
                                            required />
                                    </div>
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
                                    <div class="d-flex justify-content-center align-center">
                                        <input type="submit" name="next"
                                            class=" my-2 btn btn_connection nouveau_admin_xy " value="S'identifier" />
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

    $('.nouveau_admin_xy').prop('disabled', true);

    $('.formulaire_new_admin input').keyup(function() {
            if ($('#nom').val().length > 2 &&
                $('#email').val().length > 5 &&
                $('#new_password').val().length > 3 &&
                $('#new_password').val().length == $('#confirm_password').val().length) {
                    $('.nouveau_admin_xy').prop('disabled', false);
            } else {
                $('.nouveau_admin_xy').prop('disabled', true);
            }
        });
  });
    </script>
</body>

</html>