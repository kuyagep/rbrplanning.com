@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8 col-sm-12">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Profile Settings</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
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
@endsection
@section('script')
    {{-- Toastr Notifications --}}
    <script>
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
    </script>

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
