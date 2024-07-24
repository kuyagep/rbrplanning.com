@extends('layouts.auth.main')
@section('auth-content')
    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url('assets/img/auth/login-bg.jpg')">
                        <div class="lavalite-overlay"></div>
                    </div>
                    <canvas class="background"></canvas>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="#"><img src="assets/src/img/deped-logo.svg" width="60px" height="60px"
                                    alt=""></a>
                        </div>
                        <h3>Log In to Dashboard</h3>
                        <p>Happy to see you again!</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email"
                                    class="form-control  @error('email') is-invalid
                                @enderror"
                                    placeholder="Email" required="" value="{{ old('email') }}">
                                <i class="ik ik-user"></i>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid
                                @enderror"
                                    placeholder="Password" required="" value="">
                                <i class="ik ik-lock"></i>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="item_checkbox"
                                            name="item_checkbox" value="option1">
                                        <span class="custom-control-label">&nbsp;Remember Me</span>
                                    </label>
                                </div>
                                <div class="col text-right">
                                    <a href="#">Forgot Password ?</a>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <button class="btn btn-dark btn-block">Log In</button>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                        <span class="mt-1 mt-sm-0 text-center">Secured with
                            <i class="ik ik-shield"></i>
                            <a href="https://cloudflare.com/" target="_blank"><b>Cloudflare</b></a></span>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
