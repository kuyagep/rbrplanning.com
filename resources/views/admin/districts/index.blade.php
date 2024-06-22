@extends('admin.layouts.master')
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
                            <h5>District</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6 class="alert-heading mb-0 "><strong>{{ session('message') }}</strong></h6>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xs-12 pull-right">
                                <a href="{{ route('districts.create') }}" class="btn btn-dark mb-2 ">
                                    <i class="ik ik-user-plus"></i>
                                    Add Districts</a>

                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <form action="{{ route('districts.index') }}" method="GET"
                                    class="form-inline float-right">
                                    @csrf
                                    <input type="text" name="search" value="{{ request('search') }}" id="search"
                                        class="form-control mb-2 mr-sm-2" placeholder="Search here...">

                                    <button type="submit" class="btn btn-primary mb-2">
                                        <i class="ik ik-search"></i> Search</button>
                                </form>

                            </div>
                        </div>
                        <div class="table-data">
                            <div class="table-responsive">
                                <table id="dataTableajax" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th width="1px">
                                                <div class="custom-control custom-checkbox ml-2">
                                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                                    <label class="custom-control-label" for="select-all">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>District</th>
                                            <th>Division</th>
                                            <th>Region</th>
                                            <th class="nosort">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($paginated as  $district)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox ml-2">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="check_box_{{ $district->id }}" name="region_ids[]"
                                                            value="{{ $district->id }}">
                                                        <label class="custom-control-label"
                                                            for="check_box_{{ $district->id }}">
                                                        </label>
                                                    </div>
                                                </td>


                                                <td>{{ $district->id }}</td>
                                                <td>{{ $district->name }}</td>
                                                <td>{{ $district->division->name }}</td>
                                                <td>{{ $district->division->region->name }}</td>

                                                <td class="text-center">
                                                    <div class="table-actions ">
                                                        <a href="{{ url('/divisions', $district->id) }}"><i
                                                                class="ik ik-eye"></i></a>
                                                        <a href="{{ route('districts.edit', $district->id) }}"><i we
                                                                class="ik ik-edit-2"></i></a>
                                                        <a href="#" data-id="{{ $district->id }}"
                                                            id="deleteButton"><i class="ik ik-trash-2"></i></a>

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
                                {{ $paginated->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>


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

                var districtId = $(this).data('id');
                var route = "{{ route('districts.destroy', ':id') }}".replace(':id', districtId);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this district?",
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


        });
    </script>
@endsection
