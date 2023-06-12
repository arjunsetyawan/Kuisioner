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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Style -->
    <link rel="stylesheet" href="{!! asset('css/login/style.css') !!}">

    <title>Login E-Kinerja</title>
</head>

<body style='background-image: linear-gradient( transparent, rgba(249, 241, 245, 1)), url("img/bg.jpg");'>
    <div class="content">
        <div class="container">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show fixed-top" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show fixed-top" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="login-reg-panel">
                <div class="login-info-box">
                    <h2>Sudah Punya Akun?</h2>
                    <p>Klik button dibawah ini</p>
                    <label id="label-register" for="log-reg-show">Login</label>
                    <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
                </div>

                <div class="register-info-box">
                    <h2>Belum Punya Akun?</h2>
                    <p>Silahkan melakukan ajuan akun</p>
                    <label id="label-login" for="log-login-show">Ajuan</label>
                    <input type="radio" name="active-log-panel" id="log-login-show">
                </div>

                <form action="/login" method="post">
                    @csrf
                    <div class="white-panel">
                        <div class="login-show">
                            <h3 class="mb-4 ">LOGIN</h3>
                            <div class="form-group first">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus required placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group last mb-4">
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                            </div>

                            <input type="submit" value="LOGIN" class="btn btn-block btn-primary">
                        </div>
                </form>
                <form action="/register" method="post">
                    @csrf
                    <div class="register-show">
                        <h3 class="mb-4 ">AJUAN</h3>
                        <div class="form-group ">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <input type="hidden" class="form-control" id="role_id" value="2" name="role_id">
                        <input type="submit" class="btn btn-block btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <script src="{!! asset('js/login/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('js/login/popper.min.js') !!}"></script>
    <script src="{!! asset('js/login/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('js/login/main.js') !!}"></script>
    <script src="{!! asset('js/login/main.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
