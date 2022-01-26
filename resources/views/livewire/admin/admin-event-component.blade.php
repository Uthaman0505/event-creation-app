<div>
    <div class="container" style="padding: 30px 0;">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><strong>List of Events</strong></div>
                        <div class="col-md-6"><a href="{{ route('admin.event.add') }}"
                                class="btn btn-success pull-right">Add New Event</a></div>
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Created By</th>
                                <th>Status</th>
                                <th>Actions</th>
                                {{-- <th>Duration</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d-m-Y') }}</td>
                                    <td>
                                        {{ Auth::user()->where('id', $item->user_id)->first()->name }}
                                    </td>
                                    <td>{{ $item->status === 0 ? 'Not Approve' : 'Approved' }}</td>
                                    <td>
                                        @if (Auth::user()->user_role == 'ADMIN')
                                            <a href="{{ route('event.edit', [$item->id]) }}"><i
                                                    class="fa fa-edit fa-2x"></i></a>
                                            <a href="{{ route('event.delete', [$item->id]) }}"
                                                style="margin-left: 10px"><i
                                                    class="fa fa-trash fa-2x text-danger"></i></a>
                                        @else
                                            <a href="{{ route('management.event.edit', [$item->id]) }}"><i
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
