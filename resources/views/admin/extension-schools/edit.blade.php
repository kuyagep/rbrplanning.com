@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Extension School</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Extension School</li>
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
                        <div class="card-header">Edit Extension School</div>

                        <div class="card-body">
                            <form method="post" class="needs-validation"
                                action="{{ route('extension-schools.update', $extension_school->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="id">
                                <div class="form-group row">
                                    <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="region_id" name="region_id">
                                            <option>Choose...</option>
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}"
                                                    {{ $region->id == $extension_school->school->district->division->region->id ? 'selected' : '' }}>
                                                    {{ $region->name }}</option>
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
                                                    {{ $division->id == $extension_school->school->district->division->id ? 'selected' : '' }}>
                                                    {{ $division->name }}</option>
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
                                                    {{ $district->id == $extension_school->school->district->id ? 'selected' : '' }}>
                                                    {{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('district_id')
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
                                            @foreach ($schools as $schoolOption)
                                                <option value="{{ $schoolOption->id }}"
                                                    {{ $schoolOption->id == $extension_school->school->id ? 'selected' : '' }}>
                                                    {{ $schoolOption->name }}</option>
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
                                    <label for="schoolid" class="col-sm-3 col-form-label">Ext. School ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('schoolid') is-invalid @enderror"
                                            id="schoolid" name="schoolid"
                                            value="{{ old('schoolid', $extension_school->schoolid) }}" required>
                                        @error('schoolid')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="school_name" class="col-sm-3 col-form-label">Ext. School Name</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('school_name') is-invalid @enderror" id="school_name"
                                            name="school_name"
                                            value="{{ old('school_name', $extension_school->school_name) }}" required>
                                        @error('school_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address"
                                            value="{{ old('address', $extension_school->address) }}" required>
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
                                            class="form-control @error('mobile_number') is-invalid @enderror"
                                            id="mobile_number" name="mobile_number"
                                            value="{{ old('mobile_number', $extension_school->mobile_number) }}" required>
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
                                        <input type="email"
                                            class="form-control @error('school_email') is-invalid @enderror"
                                            id="school_email" name="school_email"
                                            value="{{ old('school_email', $extension_school->school_email) }}" required>
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
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                            id="logo" name="logo">
                                        @if ($extension_school->logo)
                                            <img src="{{ asset('uploads/logos/' . $extension_school->logo) }}"
                                                alt="School Logo" style="max-width: 200px;">
                                        @endif
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-primary">Update School</button>
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

                    $('#division_id').empty().append('<option value="">Choose...</option>');
                    $('#district_id').empty().append('<option value="">Choose...</option>');
                    $('#school_id').empty().append('<option value="">Choose...</option>');
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
                    $('#district_id').empty().append('<option value="">Choose...</option>');
                    $('#school_id').empty().append('<option value="">Choose...</option>');
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
