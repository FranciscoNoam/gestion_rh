<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>OIG-RH</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    --}}
    <link rel="stylesheet" href="{{asset('css/styleGenerale.css')}}">
    <link rel="shortcut icon" href="{{  asset('logo/zaha.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-dark bg-success justify-content-text-center">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('logo/zaha.jpg') }}" width="50" height="50"
                                class="d-inline-block align-text-top" alt="" srcset="">
                            @yield('title')
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
                                    <a class="nav-link {{Route::currentRouteNamed('home') ? 'active' : '' }}" aria-current="page"
                                        href="{{ route('home') }}">Employers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('admin.generale') ? 'active' : '' }}" href="{{ route('admin.generale') }}"><p> Génerales</p></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeconger.index') ? 'active' : '' }}" href="{{ route('demandeconger.index')}}">Demande des congers </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeabsence.index') ? 'active' : '' }}" href="{{ route('demandeabsence.index')}}">Demande des absences</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Fiche de paie</a>
                                </li>
                                @endcanany

                                @canany(['isEmployer'])
                                 <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('home') ? 'active' : '' }}" href="{{ route('home') }}" >Mes Fiches de paie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeconger.index') ? 'active' : '' }}" href="{{ route('demandeconger.index') }}" >Mes Demandes de conger</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteNamed('demandeabsence.index') ? 'active' : '' }}" href="{{ route('demandeabsence.index') }}" >Mes Demandes d' absence</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#" >Mon Compte</a>
                                </li>
                                @endcanany


                            </ul>

                            <div class="d-flex justify-content-end">

                                <label style="color:white;" class=" form-control-label me-2"> {{auth()->user()->name}}</label>
                                @auth
                                <div class="text-end">
                                    <a href="{{ route('logout') }}" class="btn btn-dark me-2">Déconnexion</a>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid content_body px-0 "
                            style="padding-bottom: 1rem; padding-top: 4.5rem;">
                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="mt-4 py-3 bg-success">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; ASA-RH {{ date('Y') }}</p>
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
