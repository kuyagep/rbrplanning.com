@extends('layouts.dashboard.main')
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
                            Email Address: {{ session('email') }} <br>
                            Temporary Password: {{ session('temp_password') }} <br>
                        </h6>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6 col-xs-12 pull-right">
                                <a href="{{ route('create.user') }}" class="btn btn-dark mb-2 ">
                                    <i class="ik ik-user-plus"></i>
                                    Add User</a>
                                <a href="#" class="btn btn-dark mb-2" id="deleteSelected">
                                    <i class="ik ik-trash "></i>
                                    Delete Selected</a>

                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <form action="{{ route('all.user') }}" method="GET" class="form-inline float-right">
                                    @csrf
                                    <input type="text" name="search" value="{{ request('search') }}" id="search"
                                        class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                                        placeholder="Search users...">

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
                                                    <input type="checkbox" class="custom-control-input" id="select_all_id">
                                                    <label class="custom-control-label" for="select_all_id">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>Id</th>
                                            <th class="nosort">Avatar</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Status</th>
                                            <th class="nosort">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($paginatedUsers as  $user)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox ml-2">
                                                        <input type="checkbox" class="custom-control-input check_box_id"
                                                            id="check_box_{{ $user->id }}" name="user_ids[]"
                                                            value="{{ $user->id }}">
                                                        <label class="custom-control-label"
                                                            for="check_box_{{ $user->id }}">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{ $user->id }}</td>
                                                <td><img src="{{ Gravatar::avatar($user->email)->defaultImage('identicon') }}"
                                                        class="table-user-thumb" alt="">
                                                </td>
                                                <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if ($user->role == 'super_admin')
                                                        <span
                                                            class="badge badge-pill badge-success">{{ ucfirst($user->role) }}</span>
                                                    @elseif ($user->role == 'admin')
                                                        <span
                                                            class="badge badge-pill badge-primary">{{ ucfirst($user->role) }}</span>
                                                    @else
                                                        <span
                                                            class="badge badge-pill badge-dark">{{ ucfirst($user->role) }}</span>
                                                    @endif

                                                </td>
                                                <td class="text-center">
                                                    @if ($user->status)
                                                        <span class="badge badge-pill badge-success mb-1">Active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger mb-1">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="table-actions ">
                                                        <a href="{{ url('/users', $user->id) }}"><i
                                                                class="ik ik-eye"></i></a>
                                                        <a href="{{ route('edit.user', $user->id) }}"><i
                                                                class="ik ik-edit-2"></i></a>
                                                        <a href="#" data-id="{{ $user->id }}"
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
                                {{ $paginatedUsers->appends(['search' => request('search')])->links() }}
                            </div>
                        </div>

                        <div class="row no-print">
                            <div class="col-12">
                                <a href="{{ url('/export/users/excel') }}" class="btn btn-success pull-right">
                                    <i class="fa fa-regular fa-file-excel"></i>
                                    Export as Excel</a>
                                <a href="{{ url('/export/users/pdf') }}" target="_blank" class="btn btn-primary pull-right"
                                    style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
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
        $(document).ready(function($) {
            // token header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Delete Function
            $('table').on('click', '#deleteButton', function(e) {
                e.preventDefault();

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
                            type: "POST",
                            url: route,
                            data: {
                                id: id
                            },
                            dataType: 'json',
                            success: function(response) {
                                console.log(response);
                                $('.table').load(location.href + ' .table');
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

            document.getElementById('select_all_id').addEventListener('click', function(event) {
                var checkboxes = document.querySelectorAll('input[name="user_ids[]"]');
                for (var checkbox of checkboxes) {
                    checkbox.checked = event.target.checked;
                }
            });

            $('#deleteSelected').click(function() {
                var selected = [];
                $('input[name="user_ids[]"]:checked').each(function() {
                    selected.push($(this).val());
                });

                if (selected.length > 0) {

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want delete this users?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm!'
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                url: '{{ route('delete.multiple.users') }}',
                                type: 'DELETE',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    user_ids: selected
                                },
                                success: function(response) {
                                    // location.reload();
                                    $('.table').load(location.href + ' .table');
                                    //Sweet Alert
                                    Swal.fire({
                                        icon: response.icon,
                                        title: response.title,
                                        text: response.message,
                                        timer: 2000
                                    });
                                },
                                error: function(xhr) {
                                    alert('An error occurred.');
                                }
                            });
                        }
                    });



                } else {
                    // alert('No users selected.');
                    Swal.fire({
                        icon: 'info',
                        title: 'Information',
                        text: 'No users selected',
                        timer: 2000
                    });
                }
            });


        });
    </script>
@endsection
