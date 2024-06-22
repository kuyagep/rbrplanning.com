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
                            <h5>Add Extension School</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @if (session('status') == 'Success')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>{{ session('message') }}</strong></h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif (session('status') == 'Error')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>{{ session('message') }}</strong></h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0"><strong>Validation Errors:</strong></h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h3>Add Extension School</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" method="post" class="needs-validation"
                            action="{{ route('extension-schools.store') }}" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="region_id" class="col-sm-3 col-form-label">Region</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="region_id" name="region_id">
                                        <option>Choose...</option>
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
                                        <option>Choose...</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->name }}</option>
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
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
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
                                            <option value="{{ $school->id }}">{{ $school->name }}</option>
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
                                    <input type="text"
                                        class="form-control @error('schoolid ')
                                       is-invalid
                                    @enderror"
                                        id="schoolid" name="schoolid" value="{{ old('schoolid ') }}" required="true">
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
                                        class="form-control @error('school_name')
                                       is-invalid
                                    @enderror"
                                        id="school_name" name="school_name" value="{{ old('school_name') }}"
                                        required="true">
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
                                    <input type="email"
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
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Create Ext. School</button>
                                    <a href="{{ route('extension-schools.index') }}" class="btn btn-light">Back</a>
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
                                    '">' + value.division_name + '</option>');
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
