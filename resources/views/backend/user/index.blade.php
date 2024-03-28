<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('user.create') }}" class="float-start btn btn-primary btn-sm">Create User</a>
                        <a href="{{ route('alluser') }}" class="float-end btn btn-danger btn-sm">Deleted User</a>
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
                                    @foreach ($user as $index => $item)
                                        <tr>
                                            <td>{{ ++$index }} </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->usertype }}</td>
                                            <td>
                                                <div><span
                                                        class="{{ $item->status == 1 ? 'badge badge-success' : 'badge badge-danger' }}">{{ $item->status == 1 ? 'Active' : 'Inactive' }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route('user.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="far fa-edit"></i> Edit</a>
                                                <a href="{{ route('user.show', $item->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Show</a>
                                                    <a href="#" onclick="confirmDelete('{{ $item->id }}');" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>

                                                    <!-- JavaScript function for confirmation -->
                                                    <script>
                                                        function confirmDelete(itemId) {
                                                            if (confirm('Are you sure you want to delete? Press OK to delete.')) {
                                                                // If user confirms, submit the corresponding form
                                                                document.getElementById('delete-form-' + itemId).submit();
                                                            }
                                                        }
                                                    </script>

                                                    <!-- Hidden form for delete action -->
                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
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
