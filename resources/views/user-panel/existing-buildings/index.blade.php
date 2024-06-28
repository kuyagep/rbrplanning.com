@extends('user-panel.layouts.master')
@section('style')
    {{-- style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8 col-sm-12">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>Summary of Existing Building </h5>
                            <span>As of {{ date('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h1>Inventories</h1>
                        <h6>School Buildings</h6>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Good Condition</th>
                                    <th>Minor Repair</th>
                                    <th>Major Repair</th>
                                    <th>Condemnation/Demolition</th>
                                    <th>Ongoing Construction</th>
                                    <th>For Completion</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $inventory_of_school_building->school->name ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->good_condition ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->minor_repair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->major_repair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->condemnation_demolition ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->on_going_contruction ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_school_building->for_completion ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6>TLS</h6>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>No. of TLS</th>
                                    <th>No. of Classes in TLS</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $tls->school->name ?? 'N/A' }}</td>
                                    <td>{{ $tls->no_of_tls ?? 'N/A' }}</td>
                                    <td>{{ $tls->no_of_classes_in_tls ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6>Make Shifts</h6>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>No. of Make Shift Rooms</th>
                                    <th>No. of Classes in Make Shift Rooms</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $makeshift->school->name ?? 'N/A' }}</td>
                                    <td>{{ $makeshift->no_of_makeshift_rooms ?? 'N/A' }}</td>
                                    <td>{{ $makeshift->no_of_classes_in_makeshift_rooms ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6>Classrooms</h6>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Good Condition</th>
                                    <th>Minor Repair</th>
                                    <th>Major Repair</th>
                                    <th>Condemnation/Demolition</th>
                                    <th>Ongoing Construction</th>
                                    <th>For Completion</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $inventory_of_classrooms->school->name ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_classrooms->good_condition ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_classrooms->minor_repair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_classrooms->major_repair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_classrooms->comdemnation_demolition ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_classrooms->on_going_construction ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_classrooms->for_completion ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h6>Furniture</h6>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Kinder Modular Table</th>
                                    <th>Kinder Chair</th>
                                    <th>Arm Chair</th>
                                    <th>School Desk</th>
                                    <th>Other Classroom Table</th>
                                    <th>Other Classroom Chair</th>
                                    <th>Sets of Tables and Chairs</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $inventory_of_furniture->school->name ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->kinder_modular_table ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->kinder_chair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->arm_chair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->school_desk ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->other_classroom_table ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->other_classroom_chair ?? 'N/A' }}</td>
                                    <td>{{ $inventory_of_furniture->sets_of_tables_and_chairs ?? 'N/A' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Token header setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Delete Function
            $('table').on('click', '#deleteButton', function(e) {
                e.preventDefault();

                var personnelID = $(this).data('id');
                var route = "{{ route('user.personnels.destroy', ':id') }}".replace(':id', personnelID);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this personnel?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: route,
                            dataType: 'json',
                            success: function(response) {
                                $('.table').load(location.href + ' .table');

                                Swal.fire({
                                    icon: response.icon,
                                    title: response.title,
                                    text: response.message,
                                    timer: 2000
                                });
                            },
                            error: function(response) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred. Please try again.',
                                    timer: 2000
                                });
                            }
                        });
                    }
                });
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
