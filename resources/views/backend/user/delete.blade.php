<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('user.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($softDeletedUsers  as $index => $item)
                                        <tr>
                                            <td>{{ ++$index }} </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->usertype }}</td>
                                            <td>
                                                <div>
                                                    <span
                                                        class="{{ $item->status == 1 ? 'badge badge-success' : 'badge badge-danger' }}">
                                                        {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="far fa-edit"></i> Edit
                                                </a>

                                                <a href="#" onclick="event.preventDefault(); document.getElementById('restore-form-{{ $item->id }}').submit();" class="btn btn-info btn-sm">Restore</a>
                                                <!-- Hidden form for restore action -->
                                                <form id="restore-form-{{ $item->id }}" action="{{ route('user.restore.post', $item->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
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

</x-app-layout>
