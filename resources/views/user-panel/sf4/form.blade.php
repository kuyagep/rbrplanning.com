@extends('user-panel.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">Submit School Form Report</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Submit School Form Report</span>
                    </div>
                </div>
                <div class="d-flex align-items-center">

                    <a href=""
                        class="btn btn-sm btn-default mr-2 d-none d-none d-lg-block pd-t-6-force pd-b-5-force">
                        <i class="fa fa-regular fa-file-excel"></i>
                        Export as Excel
                    </a>
                    <a href="" target="_blank"
                        class="btn btn-sm btn-default mr-2 mb-2 mb-md-0 d-none d-lg-block pd-t-6-force pd-b-5-force"
                        style="margin-right: 5px;">
                        <i class="fa fa-download"></i>
                        Generate PDF
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('user.sf4.submitForm') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">{{ __('Submit Report') }}</div>

                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="school_year_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('School Year') }}</label>
                                    <div class="col-md-6">
                                        <select id="school_year_id"
                                            class="form-control @error('school_year_id') is-invalid @enderror"
                                            name="school_year_id" required>
                                            <option value="">Select School Year</option>
                                            @foreach ($schoolYears as $year)
                                                <option value="{{ $year->id }}">{{ $year->school_year }}</option>
                                            @endforeach
                                        </select>

                                        @error('school_year_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="section_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Section') }}</label>
                                    <div class="col-md-6">
                                        <select id="section_id"
                                            class="form-control @error('section_id') is-invalid @enderror" name="section_id"
                                            required>
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->section_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('section_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="report_month"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Section') }}</label>
                                    <div class="col-md-6">

                                        <input type="month"
                                            class="form-control @error('report_month') is-invalid @enderror"
                                            id="report_month" name="report_month" value="{{ old('report_month') }}">

                                        @error('report_month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Registered Learners -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Registered Learners ') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="registered_learners_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="registered_learners_male" type="number"
                                            class="form-control @error('registered_learners_male') is-invalid @enderror"
                                            name="registered_learners_male" value="{{ old('registered_learners_male') }}"
                                            required>
                                        @error('registered_learners_male')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="registered_learners_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="registered_learners_female" type="number"
                                            class="form-control @error('registered_learners_female') is-invalid @enderror"
                                            name="registered_learners_female"
                                            value="{{ old('registered_learners_female') }}" required>
                                        @error('registered_learners_female')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Attendance -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Attendance') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="daily_ave_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Daily Average Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="daily_ave_male" type="number"
                                            class="form-control @error('daily_ave_male') is-invalid @enderror"
                                            name="daily_ave_male" value="{{ old('daily_ave_male') }}" required>
                                        @error('daily_ave_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="daily_ave_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Daily Average Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="daily_ave_female" type="number"
                                            class="form-control @error('daily_ave_female') is-invalid @enderror"
                                            name="daily_ave_female" value="{{ old('daily_ave_female') }}" required>
                                        @error('daily_ave_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="percentage_for_the_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Percentage for the Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="percentage_for_the_month_male" type="number"
                                            class="form-control @error('percentage_for_the_month_male') is-invalid @enderror"
                                            name="percentage_for_the_month_male"
                                            value="{{ old('percentage_for_the_month_male') }}" required>
                                        @error('percentage_for_the_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="percentage_for_the_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Percentage for the Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="percentage_for_the_month_female" type="number"
                                            class="form-control @error('percentage_for_the_month_female') is-invalid @enderror"
                                            name="percentage_for_the_month_female"
                                            value="{{ old('percentage_for_the_month_female') }}" required>
                                        @error('percentage_for_the_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dropped Out -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Dropped Out') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="dropped_out_previous_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Previous Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="dropped_out_previous_month_male" type="number"
                                            class="form-control @error('dropped_out_previous_month_male') is-invalid @enderror"
                                            name="dropped_out_previous_month_male"
                                            value="{{ old('dropped_out_previous_month_male') }}" required>
                                        @error('dropped_out_previous_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dropped_out_previous_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Previous Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="dropped_out_previous_month_female" type="number"
                                            class="form-control @error('dropped_out_previous_month_female') is-invalid @enderror"
                                            name="dropped_out_previous_month_female"
                                            value="{{ old('dropped_out_previous_month_female') }}" required>
                                        @error('dropped_out_previous_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dropped_out_end_of_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('End of Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="dropped_out_end_of_month_male" type="number"
                                            class="form-control @error('dropped_out_end_of_month_male') is-invalid @enderror"
                                            name="dropped_out_end_of_month_male"
                                            value="{{ old('dropped_out_end_of_month_male') }}" required>
                                        @error('dropped_out_end_of_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dropped_out_end_of_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('End of Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="dropped_out_end_of_month_female" type="number"
                                            class="form-control @error('dropped_out_end_of_month_female') is-invalid @enderror"
                                            name="dropped_out_end_of_month_female"
                                            value="{{ old('dropped_out_end_of_month_female') }}" required>
                                        @error('dropped_out_end_of_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Transferred Out -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Transferred Out') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="transferred_out_previous_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Previous Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_out_previous_month_male" type="number"
                                            class="form-control @error('transferred_out_previous_month_male') is-invalid @enderror"
                                            name="transferred_out_previous_month_male"
                                            value="{{ old('transferred_out_previous_month_male') }}" required>
                                        @error('transferred_out_previous_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transferred_out_previous_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Previous Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_out_previous_month_female" type="number"
                                            class="form-control @error('transferred_out_previous_month_female') is-invalid @enderror"
                                            name="transferred_out_previous_month_female"
                                            value="{{ old('transferred_out_previous_month_female') }}" required>
                                        @error('transferred_out_previous_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transferred_out_end_of_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('End of Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_out_end_of_month_male" type="number"
                                            class="form-control @error('transferred_out_end_of_month_male') is-invalid @enderror"
                                            name="transferred_out_end_of_month_male"
                                            value="{{ old('transferred_out_end_of_month_male') }}" required>
                                        @error('transferred_out_end_of_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transferred_out_end_of_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('End of Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_out_end_of_month_female" type="number"
                                            class="form-control @error('transferred_out_end_of_month_female') is-invalid @enderror"
                                            name="transferred_out_end_of_month_female"
                                            value="{{ old('transferred_out_end_of_month_female') }}" required>
                                        @error('transferred_out_end_of_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--Transferred In -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Transferred In') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="transferred_in_previous_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Previous Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_in_previous_month_male" type="number"
                                            class="form-control @error('transferred_in_previous_month_male') is-invalid @enderror"
                                            name="transferred_in_previous_month_male"
                                            value="{{ old('transferred_in_previous_month_male') }}" required>
                                        @error('transferred_in_previous_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transferred_in_previous_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Previous Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_in_previous_month_female" type="number"
                                            class="form-control @error('transferred_in_previous_month_female') is-invalid @enderror"
                                            name="transferred_in_previous_month_female"
                                            value="{{ old('transferred_in_previous_month_female') }}" required>
                                        @error('transferred_in_previous_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transferred_in_end_of_month_male"
                                        class="col-md-4 col-form-label text-md-right">{{ __('End of Month Male') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_in_end_of_month_male" type="number"
                                            class="form-control @error('transferred_in_end_of_month_male') is-invalid @enderror"
                                            name="transferred_in_end_of_month_male"
                                            value="{{ old('transferred_in_end_of_month_male') }}" required>
                                        @error('transferred_in_end_of_month_male')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="transferred_in_end_of_month_female"
                                        class="col-md-4 col-form-label text-md-right">{{ __('End of Month Female') }}</label>
                                    <div class="col-md-6">
                                        <input id="transferred_in_end_of_month_female" type="number"
                                            class="form-control @error('transferred_in_end_of_month_female') is-invalid @enderror"
                                            name="transferred_in_end_of_month_female"
                                            value="{{ old('transferred_in_end_of_month_female') }}" required>
                                        @error('transferred_in_end_of_month_female')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <a href="{{ route('user.sf4.index') }}" class="btn btn-secondary">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // Token header setup
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
                            $('#division_id').append(
                                '<option value="">Select Division</option>');
                            $.each(data.divisions, function(key, value) {
                                $('#division_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#division_id').empty();
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
                            $('#district_id').append(
                                '<option value="">Select District</option>');
                            $.each(data.districts, function(key, value) {
                                $('#district_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#district_id').empty();
                    $('#district_id').append('<option value="">Select District</option>');
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
                            $('#school_id').append('<option value="">Select School</option>');
                            $.each(data.schools, function(key, value) {
                                $('#school_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#school_id').empty();
                    $('#school_id').append('<option value="">Select School</option>');
                }
            });
        });
    </script>
@endsection
