<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><strong>List of Users</strong></div>
                        @if (Auth::user()->user_role === 'MANAGEMENT')
                            <div class="col-md-6"><a href="{{ route('management.user.add') }}"
                                    class="btn btn-success pull-right">Add New User</a></div>
                        @else
                            <div class="col-md-6"><a href="{{ route('admin.user.add') }}"
                                    class="btn btn-success pull-right">Add New User</a></div>
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    {{-- @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif --}}
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>User Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->user_role }}</td>
                                    <td>
                                        @if (Auth::user()->user_role == 'ADMIN')
                                            <a href="{{ route('user.edit', [$item->id]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="{{ route('user.delete', [$item->id]) }}"
                                                style="margin-left: 10px"><i
                                                    class="fa fa-trash fa-2x text-danger"></i></a>
                                        @else
                                            <a href="{{ route('management.edit', [$item->id]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $categories->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
