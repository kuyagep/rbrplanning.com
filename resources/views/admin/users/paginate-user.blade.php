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
                            <input type="checkbox" class="custom-control-input" id="check_box_{{ $user->id }}">
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
                        <span class="badge badge-dark">
                            admin
                        </span>
                    </th>
                    <th class="text-center">
                        <div class="badge badge-success">Active</div>
                    </th>
                    <td class="text-center ">
                        <div class="table-actions ">
                            <a href="{{ url('/users', $user->id) }}"><i class="ik ik-eye"></i></a>
                            <a href="{{ route('user.edit', $user->id) }}"><i class="ik ik-edit-2"></i></a>

                            <a href="#" data-id="{{ $user->id }}" id="deleteButton"><i
                                    class="ik ik-trash-2"></i></a>

                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
    {!! $users->links() !!}
</div>
