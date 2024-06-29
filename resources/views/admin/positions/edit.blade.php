@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Position</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Position</li>
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
                            <h3>Edit Position</h3>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-12">
                                    <form method="post" class="needs-validation"
                                        action="{{ route('positions.update', $position->id) }}" novalidate=""
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="hidden" name="id" id="id" value="{{ $position->id }}">

                                        <div class="form-group row">
                                            <label for="position_category_id" class="col-sm-3 col-form-label">Position
                                                Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="position_category_id"
                                                    name="position_category_id">
                                                    <option>Select Position Category</option>
                                                    @foreach ($position_categories as $position_category)
                                                        <option value="{{ $position_category->id }}"
                                                            {{ $position_category->id == $position->position_category_id ? 'selected' : '' }}>
                                                            {{ $position_category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Position</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $position->name) }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="employment_status_id" class="col-sm-3 col-form-label">Employment
                                                Status
                                            </label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="employment_status_id"
                                                    name="employment_status_id">
                                                    <option value="">Select Employmet Status</option>
                                                    @foreach ($employment_statuses as $employment_status)
                                                        <option value="{{ $employment_status->id }}"
                                                            {{ $employment_status->id == $position->employment_status_id ? 'selected' : '' }}>
                                                            {{ $employment_status->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <a href="{{ route('positions.index') }}" class="btn btn-secondary float-right"><i
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
