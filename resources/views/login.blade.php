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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="{!! asset('css/login/style.css') !!}">

    <title>Login E-Kinerja</title>
</head>

<body>

    <div class="content">
        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-md-6">
                    <img src="{!! asset('img/undraw_remotely_2j6y.svg') !!}" alt="Image" class="img-fluid">
                </div>

                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur
                                    adipisicing.</p>
                            </div>
                            <form action="/login" method="post">
                                @csrf
                                <div class="form-group first">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" autofocus required placeholder="Email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group last mb-4">
                                    <input type="password" class="form-control" id="password" name="password" required
                                        placeholder="Password">

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Remember
                                            me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot
                                            Password</a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                                <span class="d-block my-4 text-muted text-center">Belum memiliki akun? <a
                                        href="/register" class="text-primary">Register</a></span>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
