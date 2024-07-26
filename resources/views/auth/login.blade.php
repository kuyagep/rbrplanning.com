@extends('layouts.auth.main')
@section('style')
@endsection
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

@section('scipt')
    <script>
        const eyeIcons = {
            open: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon"><path d="M12 15a3 3 0 100-6 3 3 0 000 6z" /><path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" /></svg>',
            closed: '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="eye-icon"><path d="M3.53 2.47a.75.75 0 00-1.06 1.06l18 18a.75.75 0 101.06-1.06l-18-18zM22.676 12.553a11.249 11.249 0 01-2.631 4.31l-3.099-3.099a5.25 5.25 0 00-6.71-6.71L7.759 4.577a11.217 11.217 0 014.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113z" /><path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0115.75 12zM12.53 15.713l-4.243-4.244a3.75 3.75 0 004.243 4.243z" /><path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 00-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 016.75 12z" /></svg>'
        };

        function addListeners() {
            const toggleButton = document.querySelector(".toggle-button");

            if (!toggleButton) {
                return;
            }

            toggleButton.addEventListener("click", togglePassword);
        }

        function togglePassword() {
            const passwordField = document.querySelector("#password-field");
            const toggleButton = document.querySelector(".toggle-button");

            if (!passwordField || !toggleButton) {
                return;
            }

            toggleButton.classList.toggle("open");

            const isEyeOpen = toggleButton.classList.contains("open");

            toggleButton.innerHTML = isEyeOpen ? eyeIcons.closed : eyeIcons.open;
            passwordField.type = isEyeOpen ? "text" : "password";
        }

        document.addEventListener("DOMContentLoaded", addListeners);
    </script>
@endsection
