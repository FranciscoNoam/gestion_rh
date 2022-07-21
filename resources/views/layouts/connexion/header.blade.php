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

    <link rel="stylesheet" href="{{asset('css/styleGenerale.css')}}">
    <link rel="shortcut icon" href="{{  asset('logo/zaha.jpg') }}" type="image/x-icon">
</head>

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
                                <a class="nav-link active" aria-current="page" href="/">Se connecter</a>
                                <a class="nav-link active" aria-current="page" href="{{ route('nouveau') }}">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class=" mt3 container-fluid content_body px-0 " style="padding-bottom: 1rem; padding-top: 4.5rem;">
                    {{--  --}}
                    @yield('login_user')
                    {{--  --}}
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

    $('.sidentifier').prop('disabled', true);

    $('.formulaire input').keyup(function() {
            if ($('#identifiant').val().length > 5 &&
                $('#password').val().length > 3) {
                    $('.sidentifier').prop('disabled', false);
            } else {
                $('.sidentifier').prop('disabled', true);
            }
        });
  });
    </script>
</body>

</html>
