<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.svg') }}" type="image/x-icon"/>
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
  </head>
  <body>

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper ms-0 pb-0">

        <!-- ========== section start ========== -->
        <section class="section py-lg-5 py-4">
            <div class="container-fluid">
                <div class="row g-0 auth-row">
                    <div class="col-lg-6">
                        <div class="auth-cover-wrapper bg-primary-100">
                            <div class="auth-cover">
                                <div class="title text-center">
                                    <h1 class="text-primary mb-10">Welcome Back</h1>
                                    <p class="text-medium">
                                    Sign in to your Existing account to continue
                                    </p>
                                </div>
                                <div class="cover-image">
                                    <img src="{{ asset('backend/assets/images/auth/signin-image.svg') }}" alt="" />
                                </div>
                                <div class="shape-image">
                                    <img src="{{ asset('backend/assets/images/auth/shape.svg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                        <div class="signin-wrapper">
                            <div class="form-wrapper">
                                <h6 class="mb-15">Sign In</h6>
                                <p class="text-sm mb-25">Start creating the best possible user experience for you customers.</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Email</label>
                                                <input id="email" type="email" name="email" placeholder="Email" required />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Password</label>
                                                <input id="password" type="password" name="password" placeholder="Password" required />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                            <div class="form-check checkbox-style mb-30">
                                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember"/>
                                                <label class="form-check-label" for="remember_me">Remember me next time</label>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-xxl-6 col-lg-12 col-md-6">
                                            <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="hover-underline">Forgot Password?</a>
                                                @endif
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button class="main-btn primary-btn btn-hover w-100 text-center">Sign In</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>

                                <div class="singin-option pt-40">
                                    <p class="text-sm text-medium text-dark text-center">Don’t have any account yet?<a href="{{ route('register') }}">Create an account</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>
  </body>
</html>
