<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{!! asset('fonts/icomoon/style.css') !!}">

    <link rel="stylesheet" href="{!! asset('css/login/owl.carousel.min.css') !!}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{!! asset('css/login/bootstrap.min.css') !!}">

    <!-- Style -->
    <link rel="stylesheet" href="{!! asset('css/login/style.css') !!}">

    <title>Register</title>
</head>

<body class="">

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{!! asset('img/undraw_remotely_2j6y.svg') !!}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Register</h3>
                                <p class="mb-4">Silahkan untuk membuat akun sebelum login ke E-Kinerja</p>
                            </div>

                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group ">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" placeholder="Username"
                                        value="{{ old('username') }}">
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <input type="hidden" class="form-control" id="role_id" value="1" name="role_id">

                                <input type="submit" class="btn btn-block btn-primary">

                                <span class="d-block my-4 text-muted text-center">Sudah memiliki akun? <a href="/login"
                                        class="text-primary">Login</a></span>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{!! asset('js/login/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('js/login/popper.min.js') !!}"></script>
    <script src="{!! asset('js/login/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/login/main.js') !!}"></script>
    <script src="{!! asset('js/login/main.js') !!}"></script>
</body>

</html>
