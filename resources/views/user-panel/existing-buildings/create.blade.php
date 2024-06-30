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
                        <h4 class="pd-0 mg-0 text-10">Existing Building</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Existing Building</span>
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
                    <div class="card">
                        <div class="card-header">Create Inventory Records</div>

                        <div class="card-body">
                            <!-- Form for Inventory of School Buildings -->
                            <form method="POST" action="{{ route('inventory-of-school-buildings.store') }}">
                                @csrf


                                <div class="form-group">
                                    <label for="good_condition">Good Condition</label>
                                    <input type="number" class="form-control @error('good_condition') is-invalid @enderror"
                                        id="good_condition" name="good_condition" value="{{ old('good_condition') }}"
                                        required>
                                    @error('good_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="minor_repair">Minor Repair</label>
                                    <input type="number" class="form-control @error('minor_repair') is-invalid @enderror"
                                        id="minor_repair" name="minor_repair" value="{{ old('minor_repair') }}" required>
                                    @error('minor_repair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="major_repair">Major Repair</label>
                                    <input type="number" class="form-control @error('major_repair') is-invalid @enderror"
                                        id="major_repair" name="major_repair" value="{{ old('major_repair') }}" required>
                                    @error('major_repair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="condemnation_demolition">Condemnation/Demolition</label>
                                    <input type="number"
                                        class="form-control @error('condemnation_demolition') is-invalid @enderror"
                                        id="condemnation_demolition" name="condemnation_demolition"
                                        value="{{ old('condemnation_demolition') }}" required>
                                    @error('condemnation_demolition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="on_going_construction">Ongoing Construction</label>
                                    <input type="number"
                                        class="form-control @error('on_going_construction') is-invalid @enderror"
                                        id="on_going_construction" name="on_going_construction"
                                        value="{{ old('on_going_construction') }}" required>
                                    @error('on_going_construction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="for_completion">For Completion</label>
                                    <input type="number" class="form-control @error('for_completion') is-invalid @enderror"
                                        id="for_completion" name="for_completion" value="{{ old('for_completion') }}"
                                        required>
                                    @error('for_completion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form for TLS -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create TLS Record</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('tls.store') }}">
                                @csrf


                                <div class="form-group">
                                    <label for="no_of_tls">No. of TLS</label>
                                    <input type="number" class="form-control @error('no_of_tls') is-invalid @enderror"
                                        id="no_of_tls" name="no_of_tls" value="{{ old('no_of_tls') }}" required>
                                    @error('no_of_tls')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_of_classes_in_tls">No. of Classes in TLS</label>
                                    <input type="number"
                                        class="form-control @error('no_of_classes_in_tls') is-invalid @enderror"
                                        id="no_of_classes_in_tls" name="no_of_classes_in_tls"
                                        value="{{ old('no_of_classes_in_tls') }}" required>
                                    @error('no_of_classes_in_tls')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form for Make Shifts -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Make Shift Record</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('make-shifts.store') }}">
                                @csrf


                                <div class="form-group">
                                    <label for="no_of_makeshift_rooms">No. of Make Shift Rooms</label>
                                    <input type="number"
                                        class="form-control @error('no_of_makeshift_rooms') is-invalid @enderror"
                                        id="no_of_makeshift_rooms" name="no_of_makeshift_rooms"
                                        value="{{ old('no_of_makeshift_rooms') }}" required>
                                    @error('no_of_makeshift_rooms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_of_classes_in_makeshift_rooms">No. of Classes in Make Shift
                                        Rooms</label>
                                    <input type="number"
                                        class="form-control @error('no_of_classes_in_makeshift_rooms') is-invalid @enderror"
                                        id="no_of_classes_in_makeshift_rooms" name="no_of_classes_in_makeshift_rooms"
                                        value="{{ old('no_of_classes_in_makeshift_rooms') }}" required>
                                    @error('no_of_classes_in_makeshift_rooms')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form for Inventory of Classrooms -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Inventory of Classrooms Record</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('inventory-of-classrooms.store') }}">
                                @csrf



                                <div class="form-group">
                                    <label for="good_condition">Good Condition</label>
                                    <input type="number"
                                        class="form-control @error('good_condition') is-invalid @enderror"
                                        id="good_condition" name="good_condition" value="{{ old('good_condition') }}"
                                        required>
                                    @error('good_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="minor_repair">Minor Repair</label>
                                    <input type="number"
                                        class="form-control @error('minor_repair') is-invalid @enderror"
                                        id="minor_repair" name="minor_repair" value="{{ old('minor_repair') }}"
                                        required>
                                    @error('minor_repair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="major_repair">Major Repair</label>
                                    <input type="number"
                                        class="form-control @error('major_repair') is-invalid @enderror"
                                        id="major_repair" name="major_repair" value="{{ old('major_repair') }}"
                                        required>
                                    @error('major_repair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="condemnation_demolition">Condemnation/Demolition</label>
                                    <input type="number"
                                        class="form-control @error('condemnation_demolition') is-invalid @enderror"
                                        id="condemnation_demolition" name="condemnation_demolition"
                                        value="{{ old('condemnation_demolition') }}" required>
                                    @error('condemnation_demolition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="on_going_construction">Ongoing Construction</label>
                                    <input type="number"
                                        class="form-control @error('on_going_construction') is-invalid @enderror"
                                        id="on_going_construction" name="on_going_construction"
                                        value="{{ old('on_going_construction') }}" required>
                                    @error('on_going_construction')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="for_completion">For Completion</label>
                                    <input type="number"
                                        class="form-control @error('for_completion') is-invalid @enderror"
                                        id="for_completion" name="for_completion" value="{{ old('for_completion') }}"
                                        required>
                                    @error('for_completion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form for Inventory of Furniture -->
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Create Inventory of Furniture Record</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('inventory-of-furniture.store') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="kinder_modular_table">Kinder Modular Table</label>
                                    <input type="number"
                                        class="form-control @error('kinder_modular_table') is-invalid @enderror"
                                        id="kinder_modular_table" name="kinder_modular_table"
                                        value="{{ old('kinder_modular_table') }}" required>
                                    @error('kinder_modular_table')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kinder_chair">Kinder Chair</label>
                                    <input type="number"
                                        class="form-control @error('kinder_chair') is-invalid @enderror"
                                        id="kinder_chair" name="kinder_chair" value="{{ old('kinder_chair') }}"
                                        required>
                                    @error('kinder_chair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="arm_chair">Arm Chair</label>
                                    <input type="number" class="form-control @error('arm_chair') is-invalid @enderror"
                                        id="arm_chair" name="arm_chair" value="{{ old('arm_chair') }}" required>
                                    @error('arm_chair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="school_desk">School Desk</label>
                                    <input type="number" class="form-control @error('school_desk') is-invalid @enderror"
                                        id="school_desk" name="school_desk" value="{{ old('school_desk') }}" required>
                                    @error('school_desk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="other_classroom_table">Other Classroom Table</label>
                                    <input type="number"
                                        class="form-control @error('other_classroom_table') is-invalid @enderror"
                                        id="other_classroom_table" name="other_classroom_table"
                                        value="{{ old('other_classroom_table') }}" required>
                                    @error('other_classroom_table')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="other_classroom_chair">Other Classroom Chair</label>
                                    <input type="number"
                                        class="form-control @error('other_classroom_chair') is-invalid @enderror"
                                        id="other_classroom_chair" name="other_classroom_chair"
                                        value="{{ old('other_classroom_chair') }}" required>
                                    @error('other_classroom_chair')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sets_of_tables_and_chairs">Sets of Tables and Chairs</label>
                                    <input type="number"
                                        class="form-control @error('sets_of_tables_and_chairs') is-invalid @enderror"
                                        id="sets_of_tables_and_chairs" name="sets_of_tables_and_chairs"
                                        value="{{ old('sets_of_tables_and_chairs') }}" required>
                                    @error('sets_of_tables_and_chairs')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
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
