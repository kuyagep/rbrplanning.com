@extends('user-panel.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4>Add New Inventory Record</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Inventory Record</li>
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
                        <div class="card-body">
                            <form action="{{ route('inventory.store') }}" method="POST">
                                @csrf
                                <h6>Inventory of School Buildings</h6>
                                <div class="form-group">
                                    <label for="school_id">School ID</label>
                                    <input type="number" name="school_id" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="good_condition">Good Condition</label>
                                    <input type="number" name="good_condition" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="minor_repair">Minor Repair</label>
                                    <input type="number" name="minor_repair" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="major_repair">Major Repair</label>
                                    <input type="number" name="major_repair" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="condemnation_demolition">Condemnation/Demolition</label>
                                    <input type="number" name="condemnation_demolition" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="on_going_contruction">Ongoing Construction</label>
                                    <input type="number" name="on_going_contruction" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="for_completion">For Completion</label>
                                    <input type="number" name="for_completion" class="form-control">
                                </div>

                                <h6>TLS</h6>
                                <div class="form-group">
                                    <label for="no_of_tls">No. of TLS</label>
                                    <input type="number" name="no_of_tls" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_of_classes_in_tls">No. of Classes in TLS</label>
                                    <input type="number" name="no_of_classes_in_tls" class="form-control" required>
                                </div>

                                <h6>Make Shifts</h6>
                                <div class="form-group">
                                    <label for="no_of_makeshift_rooms">No. of Make Shift Rooms</label>
                                    <input type="number" name="no_of_makeshift_rooms" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_of_classes_in_makeshift_rooms">No. of Classes in Make Shift Rooms</label>
                                    <input type="number" name="no_of_classes_in_makeshift_rooms" class="form-control"
                                        required>
                                </div>

                                <h6>Classrooms</h6>
                                <div class="form-group">
                                    <label for="good_condition_classrooms">Good Condition</label>
                                    <input type="number" name="good_condition_classrooms" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="minor_repair_classrooms">Minor Repair</label>
                                    <input type="number" name="minor_repair_classrooms" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="major_repair_classrooms">Major Repair</label>
                                    <input type="number" name="major_repair_classrooms" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="condemnation_demolition_classrooms">Condemnation/Demolition</label>
                                    <input type="number" name="condemnation_demolition_classrooms" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="on_going_construction_classrooms">Ongoing Construction</label>
                                    <input type="number" name="on_going_construction_classrooms" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="for_completion_classrooms">For Completion</label>
                                    <input type="number" name="for_completion_classrooms" class="form-control">
                                </div>

                                <h6>Furniture</h6>
                                <div class="form-group">
                                    <label for="kinder_modular_table">Kinder Modular Table</label>
                                    <input type="number" name="kinder_modular_table" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kinder_chair">Kinder Chair</label>
                                    <input type="number" name="kinder_chair" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="arm_chair">Arm Chair</label>
                                    <input type="number" name="arm_chair" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="school_desk">School Desk</label>
                                    <input type="number" name="school_desk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="other_classroom_table">Other Classroom Table</label>
                                    <input type="number" name="other_classroom_table" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="other_classroom_chair">Other Classroom Chair</label>
                                    <input type="number" name="other_classroom_chair" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="sets_of_tables_and_chairs">Sets of Tables and Chairs</label>
                                    <input type="number" name="sets_of_tables_and_chairs" class="form-control">
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
                                $('#division_id').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
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
                            $('#district_id').empty();
                            $('#district_id').append(
                                '<option value="">Select District</option>');
                            $.each(data.districts, function(key, value) {
                                $('#district_id').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
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
