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
                            <h5>Edit Personnel</h5>
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
                        <h3>Edit Personnel</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.personnels.update', $personnel->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="employee_number">Employee Number:</label>
                                <input type="text" class="form-control" id="employee_number" name="employee_number"
                                    value="{{ $personnel->employee_number }}">
                            </div>

                            <div class="form-group">
                                <label for="item_number">Item Number:</label>
                                <input type="text" class="form-control" id="item_number" name="item_number"
                                    value="{{ $personnel->item_number }}">
                            </div>

                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    value="{{ $personnel->first_name }}">
                            </div>

                            <div class="form-group">
                                <label for="middle_name">Middle Name:</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name"
                                    value="{{ $personnel->middle_name }}">
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    value="{{ $personnel->last_name }}">
                            </div>

                            <div class="form-group">
                                <label for="birth_date">Birth Date:</label>
                                <input type="date" class="form-control" id="birth_date" name="birth_date"
                                    value="{{ $personnel->birth_date }}">
                            </div>

                            <div class="form-group">
                                <label for="mobile_number">Mobile Number:</label>
                                <input type="text" class="form-control" id="mobile_number" name="mobile_number"
                                    value="{{ $personnel->mobile_number }}">
                            </div>

                            <div class="form-group">
                                <label for="deped_email">DepEd Email:</label>
                                <input type="email" class="form-control" id="deped_email" name="deped_email"
                                    value="{{ $personnel->deped_email }}">
                            </div>

                            <div class="form-group">
                                <label for="sex">Sex:</label>
                                <select class="form-control" id="sex" name="sex">
                                    <option value="Male" @if ($personnel->sex == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if ($personnel->sex == 'Female') selected @endif>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employment_status_id">Employment Status:</label>
                                <select class="form-control" id="employment_status_id" name="employment_status_id">
                                    @foreach ($employmentStatuses as $employmentStatus)
                                        <option value="{{ $employmentStatus->id }}"
                                            @if ($personnel->employment_status_id == $employmentStatus->id) selected @endif>{{ $employmentStatus->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position_id">Position:</label>
                                <select class="form-control" id="position_id" name="position_id">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"
                                            @if ($personnel->position_id == $position->id) selected @endif>{{ $position->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="school_id">School:</label>
                                <select class="form-control" id="school_id" name="school_id">
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}"
                                            @if ($personnel->school_id == $school->id) selected @endif>{{ $school->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="funding_source_id">Funding Source:</label>
                                <select class="form-control" id="funding_source_id" name="funding_source_id">
                                    @foreach ($fundingSources as $fundingSource)
                                        <option value="{{ $fundingSource->id }}"
                                            @if ($personnel->funding_source_id == $fundingSource->id) selected @endif>
                                            {{ $fundingSource->fund_source }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
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
