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
            <div class="row">
                <div class="col-12">
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
