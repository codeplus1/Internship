
<x-frontend-template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('Inventory.create') }}" class="btn btn-primary btn-sm">Add Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SN.</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventory as $index=>$item)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ route('Inventory.edit',$item->id) }}" class="badge badge-warning"><i class="far fa-edit"></i>Edit</a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-frontend-template>
