@extends('admin.partials.app')
@section('style')
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header ">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="clearfix">
                    <div class="pt-0 pb-0">
                        <h4 class="pd-0 mg-0 text-10">Special Programs</h4>
                    </div>
                    <div class="breadcrumb pd-0 mg-0 text-sm">
                        <a class="breadcrumb-item" href="{{ route('dashboard') }}"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="">Dashboard</a>
                        <span class="breadcrumb-item active">Special Programs</span>
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
                                <div class="col-lg-6 col-xs-12 pull-right">
                                    <a href="{{ route('special-programs.create') }}" class="btn btn-dark mb-2 ">
                                        <i class="ik ik-user-plus"></i>
                                        Add Special Programs</a>

                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <form action="{{ route('special-programs.index') }}" method="GET"
                                        class="form-inline float-right">
                                        @csrf
                                        <input type="text" name="search" value="{{ request('search') }}" id="search"
                                            class="form-control mb-2 mr-sm-2" placeholder="Search special-programs...">

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
                                                <th>ID</th>
                                                <th>Specialization Program</th>
                                                <th class="nosort">&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($paginated as  $data)
                                                <tr>
                                                    <td>{{ $data->id }}</td>
                                                    <td>{{ $data->name }}</td>

                                                    <td class="text-center">
                                                        <div class="table-actions">
                                                            <a href="{{ url('/special-programs', $data->id) }}"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <a href="{{ route('special-programs.edit', $data->id) }}"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <a href="#" data-id="{{ $data->id }}"
                                                                id="deleteButton"><i class="fas fa-trash-alt"></i></a>
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

                var programs = $(this).data('id');
                var route = "{{ route('special-programs.destroy', ':id') }}".replace(':id', programs);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this special programs?",
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
                                // location.reload();
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
