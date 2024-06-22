@extends('user-panel.layouts.master')
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
                            <h5>Add Personnel</h5>
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
                        <h3>Add Personnel</h3>
                    </div>
                    <div class="card-body">
                        <form id="form" method="post" class="needs-validation"
                            action="{{ route('user.personnels.create') }}" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="employee_number" class="col-sm-3 col-form-label">Employee Number</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('employee_number') is-invalid @enderror"
                                        id="employee_number" name="employee_number" value="{{ old('employee_number') }}">
                                    @error('employee_number')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="item_number" class="col-sm-3 col-form-label">Item Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('item_number') is-invalid @enderror"
                                        id="item_number" name="item_number" value="{{ old('item_number') }}">
                                    @error('item_number')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="middle_name" class="col-sm-3 col-form-label">Middle Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('middle_name') is-invalid @enderror"
                                        id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                                    @error('middle_name')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birth_date" class="col-sm-3 col-form-label">Birth Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                        id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                                    @error('birth_date')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile_number" class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('mobile_number') is-invalid @enderror"
                                        id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}">
                                    @error('mobile_number')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deped_email" class="col-sm-3 col-form-label">DepEd Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control @error('deped_email') is-invalid @enderror"
                                        id="deped_email" name="deped_email" value="{{ old('deped_email') }}">
                                    @error('deped_email')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sex" class="col-sm-3 col-form-label">Sex</label>
                                <div class="col-sm-9">
                                    <select class="form-control @error('sex') is-invalid @enderror" id="sex"
                                        name="sex">
                                        <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                    </select>
                                    @error('sex')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="employment_status_id" class="col-sm-3 col-form-label">Employment
                                    Status</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('employment_status_id') is-invalid @enderror"
                                        id="employment_status_id" name="employment_status_id"
                                        value="{{ old('employment_status_id') }}" required>
                                    @error('employment_status_id')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position_id" class="col-sm-3 col-form-label">Position</label>
                                <div class="col-sm-9">
                                    <select class="form-control @error('position_id') is-invalid @enderror"
                                        id="position_id" name="position_id">
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}"
                                                {{ old('position_id') == $position->id ? 'selected' : '' }}>
                                                {{ $position->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('position_id')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="school_id" class="col-sm-3 col-form-label">School</label>
                                <div class="col-sm-9">
                                    <select class="form-control @error('school_id') is-invalid @enderror" id="school_id"
                                        name="school_id">
                                        @foreach ($schools as $school)
                                            <option value="{{ $school->id }}"
                                                {{ old('school_id') == $school->id ? 'selected' : '' }}>
                                                {{ $school->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('school_id')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="funding_source_id" class="col-sm-3 col-form-label">Funding Source</label>
                                <div class="col-sm-9">
                                    <select class="form-control @error('funding_source_id') is-invalid @enderror"
                                        id="funding_source_id" name="funding_source_id">
                                        <option value="">Choose...</option>
                                        @foreach ($funding_sources as $funding_source)
                                            <option value="{{ $funding_source->id }}"
                                                {{ old('funding_source_id') == $funding_source->id ? 'selected' : '' }}>
                                                {{ $funding_source->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('funding_source_id')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="remarks" class="col-sm-3 col-form-label">Remarks</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks">{{ old('remarks') }}</textarea>
                                    @error('remarks')
                                        <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Create Personnel</button>
                                    <a href="{{ route('user.personnels.index') }}" class="btn btn-light">Back</a>
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
