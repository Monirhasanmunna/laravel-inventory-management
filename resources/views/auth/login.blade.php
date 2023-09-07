<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
</head>

<body>
    <section class="">
        <div class="">
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign In</h3>
                        </div>
                        {{-- <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                            </p>
                        </div> --}}
                    </div>
                    <form action="{{ route('login') }}" method="POST" class="login-form">
                        @csrf
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="fa fa-user"></span></div>
                            <input type="email" name="email" class="form-control rounded-left" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group">
                            <div class="icon d-flex align-items-center justify-content-center"><span
                                    class="fa fa-lock"></span></div>
                            <input type="password" name="password" class="form-control rounded-left" placeholder="Enter Password"
                                required>
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <div class="w-100">
                                <label class="checkbox-wrap checkbox-primary mb-0">Save Password
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-100 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary rounded submit">Login</button>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="w-100 text-center">
                                <p><a href="#">Forgot Password</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/popper.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>

</body>

</html>
