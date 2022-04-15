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
                                    <h1 class="text-primary mb-10">Get Started</h1>
                                    <p class="text-medium">Start creating the best possible user experience <br> for you customers.</p>
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
                                <h6 class="mb-15">Sign Up</h6>
                                <p class="text-sm mb-25">Start creating the best possible user experience for you customers.</p>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Name</label>
                                                <input id="name" type="text" name="name" placeholder="Name" required />
                                            </div>
                                        </div>
                                        <!-- end col -->
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
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Confirm Password</label>
                                                <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required />
                                            </div>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                            <div class="form-check checkbox-style mb-30">
                                                <input class="form-check-input" type="checkbox" name="terms" id="terms"/>
                                                <label class="form-check-label" for="terms">'I agree to the <a href="{{ route('terms.show') }}">Terms of Service</a> and <a href="{{ route('policy.show') }}">Privacy Policy</a></label>
                                            </div>
                                            @endif

                                        </div>
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button class="main-btn primary-btn btn-hover w-100 text-center">Sign up</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>

                                <div class="singin-option pt-40">
                                    <p class="text-sm text-medium text-dark text-center">Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
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
