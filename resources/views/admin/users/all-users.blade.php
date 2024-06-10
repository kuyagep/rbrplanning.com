@extends('layouts.dashboard.main')
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
                            <h5>User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5 class="alert-heading mb-0 "><strong>{{ session('message') }}</strong></h5>
                        <hr>
                        <h6 class="mb-0">
                            Email: {{ session('email') }} <br>
                            Temporary Password: {{ session('temp_password') }} <br>
                        </h6>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <a href="{{ route('create.user') }}" class="btn btn-danger mb-3 float-right">Add User</a>
                <div class="card">
                    <div class="card-header">
                        <h3>All Users</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableajax" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th width="1px">
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="check_box">
                                                <label class="custom-control-label" for="check_box">
                                                </label>
                                            </div>

                                        </th>
                                        <th>Id</th>
                                        <th class="nosort">Avatar</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-center">Status</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox ml-2">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="check_box_{{ $user->id }}">
                                                    <label class="custom-control-label" for="check_box_{{ $user->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $user->id }}</td>
                                            <td><img src="assets/img/users/1.jpg" class="table-user-thumb" alt="">
                                            </td>
                                            <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <th>
                                                <div class="badge badge-primary">
                                                    admin
                                                </div>
                                            </th>
                                            <th class="text-center">
                                                <div class="badge badge-success">Active</div>
                                            </th>
                                            <td class="text-center ">
                                                <div class="table-actions ">
                                                    <a href="{{ url('/users', $user->id) }}"><i class="ik ik-eye"></i></a>
                                                    <a href="{{ route('user.edit', $user->id) }}"><i
                                                            class="ik ik-edit-2"></i></a>

                                                    <a href="javascript:void(0)" id="deleteButton"><i
                                                            class="ik ik-trash-2"></i></a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

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




            // Delete Function
            $('body').on('click', '#deleteButton', function() {

                var id = $(this).data('id');
                var route = "{{ route('destroy.user', ':id') }}";
                route = route.replace(':id', id);


                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want delete this user?",
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
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                var oTable = $('#dataTableajax').dataTable();
                                oTable.fnDraw(false);
                                //Sweet Alert
                                Swal.fire({
                                    icon: response.icon,
                                    title: response.title,
                                    text: response.message,
                                    timer: 2000
                                });

                            },
                            error: function(response) {
                                console.log('Error : ', response);
                            }
                        });

                    }
                });
            });


        });
    </script>
@endsection
