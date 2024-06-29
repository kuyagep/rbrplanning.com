@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Users</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Add User</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" class="needs-validation" action="{{ route('users.store') }}" novalidate=""
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="region_id" class="col-sm-3 col-form-label text-lg-right">Region<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm form-control form-control-sm-sm select2"
                                            style="width: 100%;" id="region_id" name="region_id">
                                            <option value="">Choose...</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="division_id" class="col-sm-3 col-form-label text-lg-right">Division<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                            id="division_id" name="division_id">
                                            <option value="">Choose...</option>

                                        </select>
                                        @error('division_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="district_id" class="col-sm-3 col-form-label text-lg-right">District<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                            id="district_id" name="district_id">
                                            <option value="">Choose...</option>

                                        </select>
                                        @error('division_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="school_id" class="col-sm-3 col-form-label text-lg-right">School<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm select2" style="width: 100%;"
                                            id="school_id" name="school_id">
                                            <option value="">Choose...</option>

                                        </select>
                                        @error('school_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="first_name" class="col-sm-3 col-form-label text-lg-right">Firstname<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('first_name') is-invalid @enderror"
                                            id="first_name" name="first_name" value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="last_name" class="col-sm-3 col-form-label text-lg-right">Lastname<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('last_name') is-invalid @enderror"
                                            id="last_name" name="last_name" value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label text-lg-right">Email<span
                                            class="text-danger">* </label>
                                    <div class="col-sm-9">
                                        <input type="email"
                                            class="form-control form-control-sm  @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group
                                            row">
                                    <div class="col-sm-3 col-form-label text-lg-right"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" id="btn-save" class="btn btn-primary mr-2">Create
                                            User</button>
                                        <a href="{{ route('users.index') }}" class="btn btn-light">Back</a>
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

            // Fetch divisions based on selected region
            $('#region_id').change(function() {
                var regionId = $(this).val();
                if (regionId) {
                    $.ajax({
                        url: '{{ route('fetch.divisions') }}', // Change this to your actual route
                        type: 'POST',
                        data: {
                            region_id: regionId
                        },
                        success: function(data) {
                            console.log(data);
                            $('#division_id').empty();
                            $('#division_id').append('<option value="">Choose...</option>');
                            $.each(data.divisions, function(key, value) {
                                $('#division_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#division_id').empty();
                    $('#division_id').append('<option value="">Choose...</option>');
                }
            });


            // Fetch districts based on selected division
            $('#division_id').change(function() {
                var divisionId = $(this).val();
                if (divisionId) {
                    $.ajax({
                        url: '{{ route('fetch.districts') }}', // Change this to your actual route
                        type: 'POST',
                        data: {
                            division_id: divisionId
                        },
                        success: function(data) {
                            console.log(data);
                            $('#district_id').empty();
                            $('#district_id').append('<option value="">Choose...</option>');
                            $.each(data.districts, function(key, value) {
                                $('#district_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district_id').empty();
                    $('#district_id').append('<option value="">Choose...</option>');
                }
            });

            // Fetch schools based on selected district
            $('#district_id').change(function() {
                var districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: '{{ route('fetch.schools') }}',
                        type: 'POST',
                        data: {
                            district_id: districtId
                        },
                        success: function(data) {
                            console.log(data);
                            $('#school_id').empty();
                            $('#school_id').append('<option value="">Choose...</option>');
                            $.each(data.schools, function(key, value) {
                                $('#school_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#school_id').empty();
                    $('#school_id').append('<option value="">Choose...</option>');
                }
            });


        });
    </script>
@endsection
