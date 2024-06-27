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
                                <form method="post" class="needs-validation"
                                    action="{{ route('users.update', $user->id) }}" novalidate=""
                                    enctype="multipart/form-data">

                                    @csrf

                                    @method('PUT')
                                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                                    <div class="form-group row">
                                        <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="region_id" name="region_id">
                                                <option>Choose...</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}"
                                                        {{ $region->id == $user->school->district->division->region->id ? 'selected' : '' }}>
                                                        {{ $region->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="division_id" class="col-sm-3 col-form-label">Division</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="division_id" name="division_id">
                                                <option>Choose...</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}"
                                                        {{ $division->id == $user->school->district->division->id ? 'selected' : '' }}>
                                                        {{ $division->name }}
                                                    </option>
                                                @endforeach
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
                                                <option>Choose...</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $district->id == $user->school->district->id ? 'selected' : '' }}>
                                                        {{ $district->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('division_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="school_id" class="col-sm-3 col-form-label">School</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="school_id" name="school_id">
                                                <option>Choose...</option>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}"
                                                        {{ $school->id == $user->school->id ? 'selected' : '' }}>
                                                        {{ $school->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('school_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="first_name" name="first_name"
                                                value="{{ old('first_name', $user->first_name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
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
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary float-right"><i
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
