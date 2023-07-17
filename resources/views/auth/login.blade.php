<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="atlantis/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="atlantis/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="atlantis/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="atlantis/login/css/style.css">

    <title>Login #7</title>
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="atlantis/login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                            </div>
                            <form action="/proses-login" method="post">
                                @csrf
                                <div class="form-group first">
                                    <input type="text" class="form-control" name="email" id="username" placeholder="Email">
                                </div>
                                <div class="form-group last mb-4">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

    <script src="atlantis/login/js/jquery-3.3.1.min.js"></script>
    <script src="atlantis/login/js/popper.min.js"></script>
    <script src="atlantis/login/js/bootstrap.min.js"></script>
    <script src="atlantis/login/js/main.js"></script>
</body>

</html>
