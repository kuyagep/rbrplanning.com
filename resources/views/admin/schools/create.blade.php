@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>School</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">School</li>
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
                            <h3>Add School</h3>
                        </div>
                        <div class="card-body">
                            <form id="form" method="post" class="needs-validation"
                                action="{{ route('schools.store') }}" novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="region_id" name="region_id">
                                            <option value="">Choose...</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="division_id" class="col-sm-3 col-form-label">Division</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="division_id" name="division_id">
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
                                    <label for="district_id" class="col-sm-3 col-form-label">District</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="district_id" name="district_id">
                                            <option value="">Choose...</option>

                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="school_id" class="col-sm-3 col-form-label">School ID</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('school_id')
                                           is-invalid
                                        @enderror"
                                            id="school_id" name="school_id" value="{{ old('school_id') }}" required="true">
                                        @error('school_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-sm-3 col-form-label">School CODE</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('code')
                                           is-invalid
                                        @enderror"
                                            id="code" name="code" value="{{ old('code') }}" required="true">
                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-3 col-form-label">School Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('name')
                                           is-invalid
                                        @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required="true">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('address')
                                           is-invalid
                                        @enderror"
                                            id="address" name="address" value="{{ old('address') }}" required="true">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mobile_number" class="col-sm-3 col-form-label">Mobile Number</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('mobile_number')
                                           is-invalid
                                        @enderror"
                                            id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}"
                                            required="true">
                                        @error('mobile_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="school_email" class="col-sm-3 col-form-label">School Email</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('school_email')
                                           is-invalid
                                        @enderror"
                                            id="school_email" name="school_email" value="{{ old('school_email') }}"
                                            required="true">
                                        @error('school_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="logo" class="col-sm-3 col-form-label">School Logo</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('logo')
                                           is-invalid
                                        @enderror"
                                            id="logo" name="logo" value="{{ old('logo') }}" required="true">
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 col-form-label">School Description</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('description')
                                           is-invalid
                                        @enderror"
                                            id="description" name="description" value="{{ old('description') }}"
                                            required="true">
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Create School</button>
                                        <a href="{{ route('schools.index') }}" class="btn btn-light">Back</a>
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






        });
    </script>
@endsection
