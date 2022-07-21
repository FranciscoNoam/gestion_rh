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
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    --}}
    <link rel="stylesheet" href="{{asset('css/styleGenerale.css')}}">
    <link rel="shortcut icon" href="{{  asset('logo/oig_violet.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-dark header_menu " style="overflow-x: auto;">
                    <div class="container-fluid ">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <div class="row">
                                <div class="col"> <img src="{{ asset('logo/oig_violet.jpg') }}" width="80" height="80"
                                        class="d-inline-block align-text-top" alt="" srcset="">
                                </div>
                                <div class="col">
                                    <p>OIGASA </p>
                                    <p style="font-size: 60%;"> <span
                                            style="color: yellow; font-family:bold">O</span>utils <span
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
                        <div class="collapse  navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                @canany(['isAdmin','isSuperAdmin'])
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('home') ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('home') }}">Employers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('admin.generale') ? 'active' : '' }}"
                                        href="{{ route('admin.generale') }}">
                                        <p> Génerales</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeconger.index') ? 'active' : '' }}"
                                        href="{{ route('demandeconger.index')}}">Demande de conger </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeabsence.index') ? 'active' : '' }}"
                                        href="{{ route('demandeabsence.index')}}">Demande d' absence</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Fiche de paie</a>
                                </li>
                                @endcanany

                                @canany(['isEmployer'])
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('home') ? 'active' : '' }}"
                                        href="{{ route('home') }}">Fiche de paie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeconger.index') ? 'active' : '' }}"
                                        href="{{ route('demandeconger.index') }}">Demande de conger</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeabsence.index') ? 'active' : '' }}"
                                        href="{{ route('demandeabsence.index') }}">Demande d' absence</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-solid fa-gear"></i> Réglage</a>
                                </li>
                                @endcanany


                            </ul>

                            <div class="d-flex justify-content-end">

                                <label style="color:white;" class=" form-control-label me-2">
                                    {{auth()->user()->name}}</label>
                                @auth
                                <div class="text-end">
                                    <a href="{{ route('logout') }}" class="btn btn-dark me-2"><i
                                            class="fa fa-right-from-bracket"></i> Déconnexion</a>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="row">
                    @canany(['isAdmin'])
                    <h4>OIGASA > Admin ><span class="title">@yield('title')</span></h4>
                    @endcanany
                    @canany(['isSuperAdmin'])
                    <h4>OIGASA > Super Admin ><span class="title">@yield('title')</span></h4>
                    @endcanany
                    @canany(['isEmployer'])
                    <h4>OIGASA > Employer ><span class="title">@yield('title')</span></h4>
                    @endcanany

                    <div class="col-md-12">
                        <div class="container-fluid content_body px-0 "
                            style="padding-bottom: 1rem; padding-top: 4.5rem;">
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-4 py-3 footer_menu">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; OIG-RH {{ date('Y') }}</p>
            </div>
            <!-- /.container -->
        </footer>
    </div>




    {{-- <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"></script>

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