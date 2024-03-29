<x-frontend-template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('Inventory.index') }}" class="btn btn-primary btn-sm">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('Inventory.uupdate',$inventory->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Inventory Name <span class="text-danger">*</span></label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $inventory->name }}" >
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Update Record</button>
                </form>
            </div>
        </div>
    </div>
</x-frontend-template>
