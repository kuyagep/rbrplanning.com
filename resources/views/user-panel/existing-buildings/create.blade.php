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
                        <h4 class="pd-0 mg-0 text-10">Submit Inventory Report</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Submit Inventory Report</span>
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
                    <form method="POST" action="{{ route('user.existing-buildings.store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">{{ __('Submit Inventory Report') }}</div>

                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="school_id"
                                        class="col-md-4 col-form-label text-md-right">{{ __('School') }}</label>

                                    <div class="col-md-6">
                                        <select id="school_id" class="form-control @error('school_id') is-invalid @enderror"
                                            name="school_id" required>
                                            <option value="">Select School</option>
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
                            </div>
                        </div>
                        <!-- Inventory of School Buildings -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Inventory of School Buildings') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="good_condition"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Good Condition') }}</label>
                                    <div class="col-md-6">
                                        <input id="good_condition" type="number"
                                            class="form-control @error('good_condition') is-invalid @enderror"
                                            name="good_condition" value="{{ old('good_condition') }}" required>
                                        @error('good_condition')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="minor_repair"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Minor Repair') }}</label>
                                    <div class="col-md-6">
                                        <input id="minor_repair" type="number"
                                            class="form-control @error('minor_repair') is-invalid @enderror"
                                            name="minor_repair" value="{{ old('minor_repair') }}" required>
                                        @error('minor_repair')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="major_repair"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Major Repair') }}</label>
                                    <div class="col-md-6">
                                        <input id="major_repair" type="number"
                                            class="form-control @error('major_repair') is-invalid @enderror"
                                            name="major_repair" value="{{ old('major_repair') }}" required>
                                        @error('major_repair')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="condemnation_demolition"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Condemnation/Demolition') }}</label>
                                    <div class="col-md-6">
                                        <input id="condemnation_demolition" type="number"
                                            class="form-control @error('condemnation_demolition') is-invalid @enderror"
                                            name="condemnation_demolition" value="{{ old('condemnation_demolition') }}"
                                            required>
                                        @error('condemnation_demolition')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="on_going_contruction"
                                        class="col-md-4 col-form-label text-md-right">{{ __('On-going Construction') }}</label>
                                    <div class="col-md-6">
                                        <input id="on_going_contruction" type="number"
                                            class="form-control @error('on_going_contruction') is-invalid @enderror"
                                            name="on_going_contruction" value="{{ old('on_going_contruction') }}"
                                            required>
                                        @error('on_going_contruction')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="for_completion"
                                        class="col-md-4 col-form-label text-md-right">{{ __('For Completion') }}</label>
                                    <div class="col-md-6">
                                        <input id="for_completion" type="number"
                                            class="form-control @error('for_completion') is-invalid @enderror"
                                            name="for_completion" value="{{ old('for_completion') }}" required>
                                        @error('for_completion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TLS -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('TLS') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no_of_tls"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Number of TLS') }}</label>
                                    <div class="col-md-6">
                                        <input id="no_of_tls" type="number"
                                            class="form-control @error('no_of_tls') is-invalid @enderror" name="no_of_tls"
                                            value="{{ old('no_of_tls') }}" required>
                                        @error('no_of_tls')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_of_classes_in_tls"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Number of Classes in TLS') }}</label>
                                    <div class="col-md-6">
                                        <input id="no_of_classes_in_tls" type="number"
                                            class="form-control @error('no_of_classes_in_tls') is-invalid @enderror"
                                            name="no_of_classes_in_tls" value="{{ old('no_of_classes_in_tls') }}"
                                            required>
                                        @error('no_of_classes_in_tls')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- MakeShifts -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('MakeShifts') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no_of_makeshift_rooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Number of MakeShift Rooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="no_of_makeshift_rooms" type="number"
                                            class="form-control @error('no_of_makeshift_rooms') is-invalid @enderror"
                                            name="no_of_makeshift_rooms" value="{{ old('no_of_makeshift_rooms') }}"
                                            required>
                                        @error('no_of_makeshift_rooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_of_classes_in_makeshift_rooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Number of Classes in MakeShift Rooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="no_of_classes_in_makeshift_rooms" type="number"
                                            class="form-control @error('no_of_classes_in_makeshift_rooms') is-invalid @enderror"
                                            name="no_of_classes_in_makeshift_rooms"
                                            value="{{ old('no_of_classes_in_makeshift_rooms') }}" required>
                                        @error('no_of_classes_in_makeshift_rooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Inventory of Classrooms -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Inventory of Classrooms') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="good_condition_classrooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Good Condition Classrooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="good_condition_classrooms" type="number"
                                            class="form-control @error('good_condition_classrooms') is-invalid @enderror"
                                            name="good_condition_classrooms"
                                            value="{{ old('good_condition_classrooms') }}" required>
                                        @error('good_condition_classrooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="minor_repair_classrooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Minor Repair Classrooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="minor_repair_classrooms" type="number"
                                            class="form-control @error('minor_repair_classrooms') is-invalid @enderror"
                                            name="minor_repair_classrooms" value="{{ old('minor_repair_classrooms') }}"
                                            required>
                                        @error('minor_repair_classrooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="major_repair_classrooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Major Repair Classrooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="major_repair_classrooms" type="number"
                                            class="form-control @error('major_repair_classrooms') is-invalid @enderror"
                                            name="major_repair_classrooms" value="{{ old('major_repair_classrooms') }}"
                                            required>
                                        @error('major_repair_classrooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="comdemnation_demolition_classrooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Condemnation/Demolition Classrooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="comdemnation_demolition_classrooms" type="number"
                                            class="form-control @error('comdemnation_demolition_classrooms') is-invalid @enderror"
                                            name="comdemnation_demolition_classrooms"
                                            value="{{ old('comdemnation_demolition_classrooms') }}" required>
                                        @error('comdemnation_demolition_classrooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="on_going_construction_classrooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('On-going Construction Classrooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="on_going_construction_classrooms" type="number"
                                            class="form-control @error('on_going_construction_classrooms') is-invalid @enderror"
                                            name="on_going_construction_classrooms"
                                            value="{{ old('on_going_construction_classrooms') }}" required>
                                        @error('on_going_construction_classrooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="for_completion_classrooms"
                                        class="col-md-4 col-form-label text-md-right">{{ __('For Completion Classrooms') }}</label>
                                    <div class="col-md-6">
                                        <input id="for_completion_classrooms" type="number"
                                            class="form-control @error('for_completion_classrooms') is-invalid @enderror"
                                            name="for_completion_classrooms"
                                            value="{{ old('for_completion_classrooms') }}" required>
                                        @error('for_completion_classrooms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Inventory of Furniture -->
                        <div class="card mt-3">
                            <div class="card-header">{{ __('Inventory of Furniture') }}</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kinder_modular_table"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Kinder Modular Table') }}</label>
                                    <div class="col-md-6">
                                        <input id="kinder_modular_table" type="number"
                                            class="form-control @error('kinder_modular_table') is-invalid @enderror"
                                            name="kinder_modular_table" value="{{ old('kinder_modular_table') }}"
                                            required>
                                        @error('kinder_modular_table')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kinder_chair"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Kinder Chair') }}</label>
                                    <div class="col-md-6">
                                        <input id="kinder_chair" type="number"
                                            class="form-control @error('kinder_chair') is-invalid @enderror"
                                            name="kinder_chair" value="{{ old('kinder_chair') }}" required>
                                        @error('kinder_chair')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="arm_chair"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Arm Chair') }}</label>
                                    <div class="col-md-6">
                                        <input id="arm_chair" type="number"
                                            class="form-control @error('arm_chair') is-invalid @enderror"
                                            name="arm_chair" value="{{ old('arm_chair') }}" required>
                                        @error('arm_chair')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="school_desk"
                                        class="col-md-4 col-form-label text-md-right">{{ __('School Desk') }}</label>
                                    <div class="col-md-6">
                                        <input id="school_desk" type="number"
                                            class="form-control @error('school_desk') is-invalid @enderror"
                                            name="school_desk" value="{{ old('school_desk') }}" required>
                                        @error('school_desk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="other_classroom_table"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Other Classroom Table') }}</label>
                                    <div class="col-md-6">
                                        <input id="other_classroom_table" type="number"
                                            class="form-control @error('other_classroom_table') is-invalid @enderror"
                                            name="other_classroom_table" value="{{ old('other_classroom_table') }}"
                                            required>
                                        @error('other_classroom_table')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="other_classroom_chair"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Other Classroom Chair') }}</label>
                                    <div class="col-md-6">
                                        <input id="other_classroom_chair" type="number"
                                            class="form-control @error('other_classroom_chair') is-invalid @enderror"
                                            name="other_classroom_chair" value="{{ old('other_classroom_chair') }}"
                                            required>
                                        @error('other_classroom_chair')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sets_of_tables_and_chairs"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Sets of Tables and Chairs') }}</label>
                                    <div class="col-md-6">
                                        <input id="sets_of_tables_and_chairs" type="number"
                                            class="form-control @error('sets_of_tables_and_chairs') is-invalid @enderror"
                                            name="sets_of_tables_and_chairs"
                                            value="{{ old('sets_of_tables_and_chairs') }}" required>
                                        @error('sets_of_tables_and_chairs')
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
                                <a href="{{ route('user.existing-buildings.store') }}" class="btn btn-secondary">
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
