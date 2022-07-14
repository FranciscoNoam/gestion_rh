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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('assets/css/styleGeneral.css')}}">
    <link rel="shortcut icon" href="{{  asset('logo/zaha.jpg') }}" type="image/x-icon">
</head>

<body>

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
                                    <a class="nav-link active" aria-current="page" href="#">Liste employers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                        aria-expanded="false"> Demande des employers</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Demande des congers</a></li>
                                        <li><a class="dropdown-item" href="#">Demande d'absence</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Fiche de
                                        paie</a>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <label class="form-control-label me-2" > Nom User connecter</label>
                                <button class="btn btn-outline-success" type="submit">Déconnexion</button>
                            </form>
                        </div>
                    </div>
                </nav>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="container-fluid content_body px-0 "
                            style="padding-bottom: 1rem; padding-top: 4.5rem;">
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script type="text/javascript">

    </script>
</body>

</html>