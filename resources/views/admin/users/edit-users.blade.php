@extends('admin.layouts.master')
@section('style')
    {{-- style --}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8 col-sm-12">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Edit User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading mb-0 "><strong>{{ session('message') }}</strong></h5>
                        <hr>
                        <h6 class="mb-0">
                            Email: {{ session('email') }} <br>
                            Temporary Password: {{ session('temp_password') }} <br>
                        </h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Edit User</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <form action="{{ route('reset.password.user') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                    <button class="btn btn-danger float-right" type="submit"><i
                                            class="ik ik-rotate-ccw"></i>
                                        Reset Password</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <form method="post" class="needs-validation" action="{{ route('user.update', $user->id) }}"
                                    novalidate="" enctype="multipart/form-data">

                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-3 col-form-label">FirstName</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="{{ old('first_name', $user->first_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-sm-3 col-form-label">LastName</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="last_name" name="last_name"
                                                value="{{ old('last_name', $user->last_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>
                                    <a href="{{ route('all.user') }}" class="btn btn-secondary float-right"><i
                                            class="ik ik-chevron-left"></i>Back</a>
                                    <button type="submit" class="btn btn-primary mr-2 float-right"><i
                                            class="ik ik-save"></i>
                                        Update</button>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- script --}}
@endsection
