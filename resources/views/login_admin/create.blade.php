<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ASA-RH</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/styleGeneral.css')}}">
    <link rel="shortcut icon" href="{{  asset('logo/zaha.jpg') }}" type="image/x-icon">
</head>

<body>

   <style>
        body{
            background-color: rgb(238, 230, 230);
        }
       .teste {
          border-radius: 2.50rem 2.50rem 1rem 1rem !important;
        }
    </style>

    <div class="container-fluid ms-3">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-text-center"
                    style="background-color: rgb(23, 199, 23);">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('logo/zaha.jpg') }}" width="50" height="50"
                                class="d-inline-block align-text-top" alt="" srcset="">
                            ASA.RH
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">A propos</a>
                                </li>

                            </ul>
                            <div class="d-flex">
                                <a class="nav-link active" aria-current="page" href="#">Se connecter</a>
                                <a class="nav-link active" aria-current="page" href="#">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class=" mt3 container-fluid content_body px-0 " style="padding-bottom: 1rem; padding-top: 4.5rem;">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="shadow p-3 bg-body  rounded">
                                <div  class=" row" >
                                    <div class="col"></div>
                                    <div class="col-5  justify-content-center align-center" >
                                        <img src="{{ asset('logo/zaha.jpg') }}" width="80" height="80"
                                        class="d-inline-block align-text-top" alt="" srcset="">
                                        <h4> Nouveau Admin</h4>
                                    </div>
                                    <div class="col"></div>

                                </div>
                                <form action="{{route('admin.login')}}" class="formulaire_new mt-5" id="msform_facture" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group my-1">
                                        <label for="nom" class="mb-1 form-control-placeholder">Nom Complet<strong style="color:#ff0000;">*</strong></label>
                                        <input type="text" name="nom" class="form-control input_inscription" placeholder="Nom complet" id="nom" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="email" class="mb-1 form-control-placeholder">Email<strong style="color:#ff0000;">*</strong></label>
                                        <input type="email" name="email" class="form-control input_inscription" placeholder="email" id="email" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="identifiant" class="mb-1 form-control-placeholder">Identifiant<strong style="color:#ff0000;">*</strong></label>
                                        <input type="text" name="identifiant" class="form-control input_inscription" placeholder="identifiant" id="identifiant" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="new_password" class="mb-1 form-control-placeholder">Nouveau mot de passe<strong style="color:#ff0000;">*</strong></label>
                                        <input type="password" name="new_password" class="form-control input_inscription" placeholder="nouveau mot de passe" id="new_password" required />
                                    </div>
                                    <div class="form-group my-1">
                                        <label for="confirm_password" class="mb-1 form-control-placeholder">Confirmer Nouveau mot de passe<strong style="color:#ff0000;">*</strong></label>
                                        <input type="password" name="confirm_password" class="form-control input_inscription" placeholder="confirmer Nouveau mot de passe" id="confirm_password" required />
                                    </div>

                                    <div  class=" row" >
                                        <div class="col"></div>
                                        <div class="col-4  justify-content-center align-center" >
                                            <input type="submit" name="next" class=" my-2 btn btn-success nouveau_admin " value="S'identifier" />
                                        </div>
                                        <div class="col"></div>

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
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <script type="text/javascript">
  $(document).ready(function() {

    $('.nouveau_admin').prop('disabled', true);

    $('.formulaire_new input').keyup(function() {
            if ($('#nom').val().length > 2 &&
                $('#email').val().length > 5 &&
                $('#identifiant').val().length > 5 &&
                $('#new_password').val().length > 3 &&
                $('#new_password').val().length == $('#confirm_password').val().length) {
                    $('.nouveau_admin').prop('disabled', false);
            } else {
                $('.nouveau_admin').prop('disabled', true);
            }
        });
  });
    </script>
</body>

</html>
