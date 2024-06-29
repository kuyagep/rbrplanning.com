@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ">
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Profile Settings</h3>
                        </div>
                        <div class="card-body">
                            <h6 class="heading-small text-muted mb-4">Update Security Password</h6>
                            <form class="form-horizontal needs-validation" action="{{ route('profile-settings.update') }}"
                                method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-2 col-form-label">Current
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password"
                                            class="form-control @error('current_password')  is-invalid   @enderror "
                                            id="current_password" name="current_password" placeholder="" required>
                                        <small id="verifyCurrentPassword"> </small>
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="new_password" name="new_password"
                                            placeholder="" required>
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password_confirmation" class="col-sm-2 col-form-label">Confirm
                                        Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            id="new_password_confirmation" placeholder="" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
@endsection
