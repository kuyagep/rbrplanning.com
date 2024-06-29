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
                        <h4 class="pd-0 mg-0 text-10">Personnel</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Personnel</span>
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
                            <div class="row">
                                <div class="col-lg-8 col-xs-12 pull-left">

                                    <form action="{{ route('user.personnels.index') }}" method="GET"
                                        class="form-inline float-left">
                                        @csrf

                                        <div class="form-group mb-2 mr-sm-2">
                                            <label for="filter">Filters</label>
                                        </div>
                                        <div class="form-group mb-2 mr-sm-2">
                                            <select name="region_id" id="region_id" class="form-control">
                                                <option value="">Select Region</option>
                                                @foreach ($regions as $region)
                                                    <option value="{{ $region->id }}"
                                                        {{ $region->id == request('region_id') ? 'selected' : '' }}>
                                                        {{ $region->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mr-sm-2">
                                            <select name="division_id" id="division_id" class="form-control">
                                                <option value="">Select Division</option>
                                                @foreach ($divisions as $division)
                                                    <option value="{{ $division->id }}"
                                                        {{ $division->id == request('division_id') ? 'selected' : '' }}>
                                                        {{ $division->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mr-sm-2">
                                            <select name="district_id" id="district_id" class="form-control">
                                                <option value="">Select District</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}"
                                                        {{ $district->id == request('district_id') ? 'selected' : '' }}>
                                                        {{ $district->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mr-sm-2">
                                            <select name="school_id" id="school_id" class="form-control">
                                                <option value="">Select School</option>
                                                @foreach ($schools as $school)
                                                    <option value="{{ $school->id }}"
                                                        {{ $school->id == request('school_id') ? 'selected' : '' }}>
                                                        {{ $school->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-2 mr-sm-2">
                                            <input type="text" name="search" value="{{ request('search') }}"
                                                id="search" class="form-control" placeholder="Search name...">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2"><i class="ik ik-search"></i>
                                            Search</button>
                                    </form>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                    <a href="{{ route('user.personnels.create') }}" class="btn btn-dark mb-2 float-right">
                                        <i class="ik ik-plus"></i> Add Personnel</a>
                                </div>
                            </div>
                            <div class="table-data">
                                <div class="table-responsive">
                                    <table id="dataTableajax" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Item Number</th>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>School</th>
                                                <th>District</th>
                                                <th>Employment Status</th>
                                                <th>Remarks</th>
                                                <th class="nosort">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($paginated as  $personnel)
                                                <tr>
                                                    <td>{{ $personnel->item_number }}</td>
                                                    <td>{{ $personnel->first_name }} {{ $personnel->middle_name }}
                                                        {{ $personnel->last_name }}</td>
                                                    <td>{{ $personnel->position->name }}</td>
                                                    <td>{{ $personnel->school->name }}</td>
                                                    <td>{{ $personnel->school->district->name }}</td>
                                                    <td>{{ $personnel->employmentStatus->name }}</td>
                                                    <td>{{ $personnel->remarks }}</td>
                                                    <td class="text-center">
                                                        <div class="table-actions ">
                                                            <a href="{{ url('/user/personnels', $personnel->id) }}"><i
                                                                    class="fas fa-search"></i></a>
                                                            <a href="{{ route('user.personnels.edit', $personnel->id) }}"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <a href="#" data-id="{{ $personnel->id }}"
                                                                id="deleteButton"><i class="fas fa-times"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">No data found!</td>
                                                </tr>
                                            @endforelse

                                        </tbody>

                                    </table>
                                    {{ $paginated->appends(request()->except('page'))->links() }}
                                </div>
                            </div>


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
