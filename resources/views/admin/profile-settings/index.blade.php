@extends('admin.partials.app')
@section('style')
    <style>
        .password-wrapper {
            position: relative;
        }

        .toggle-button {
            display: inline-flex;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: unset;
            right: 12px;
            cursor: pointer;
        }

        .eye-icon {
            width: 20px;
            height: 20px;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">Profile Setting</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Profile Setting</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">

                    <a href=""
                        class="btn btn-sm btn-default mr-2 d-none d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i class="fa fa-regular fa-file-excel"></i>
                        Export as Excel
                    </a>
                    <a href="" target="_blank"
                        class="btn btn-sm btn-default mr-2 mb-2 mb-md-0 d-none d-lg-block pd-t-6-force pd-b-5-force"
                        style="margin-right: 5px;">
                        <i class="fa fa-download"></i>
                        Generate PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content pt-3 p-md-3 p-lg-4">
        <div class="container-fluid">
            <h4 class="page-title">Profile Settings</h4>
            <hr class="mb-4">
            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <h5 class="section-title">Change Password</h5>
                    <div class="section-intro">Update your account password for better security. Enter your current
                        password, then your new password twice to confirm, and click "Submit." <a href="#">Learn
                            more</a></div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="card card-settings shadow-sm p-4">
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('profile-settings.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password </label>
                                    <input type="text"
                                        class="form-control @error('current_password')  is-invalid   @enderror"
                                        id="current_password" name="current_password" required>
                                    <small id="verifyCurrentPassword"> </small>
                                    @error('current_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="text" class="form-control" name="new_password" id="new_password"
                                        required>
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="new_password_confirmation" class="form-label">
                                        Confirm Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" id="password-field" class="form-control" />
                                        <div class="toggle-button">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                                class="eye-icon">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger">Submit</button>


                            </form>
                        </div><!--//card-body-->

                    </div><!--//card-->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function($) {
            // token header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#current_password").keyup(function() {
                var current_password = $("#current_password").val();
                var route = "{{ route('profile-settings.check-current-password') }}";
                $.ajax({
                    type: "POST",
                    url: route,
                    data: {
                        current_password: current_password
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.message == "false") {
                            $("#verifyCurrentPassword").html("Current Password is incorrect!");
                        } else if (response.message == "true") {
                            $("#verifyCurrentPassword").html("Current Password is correct!");
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });

            @if (Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch (type) {
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;

                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;

                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;

                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif

        });
    </script>

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
