<x-frontend-template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('Product.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card-body">

                <form action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input id="name" class="form-control" type="text" name="name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" class="form-control" type="number" name="quantity">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="manufacture_price">Manufacture Price</label>
                                <input id="manufacture_price" class="form-control" type="number" name="manufacture_price">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="selling_price">Selling Price</label>
                                <input id="selling_price" class="form-control" type="number" name="selling_price">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control summernote" name="description"
                                    placeholder="कृप्या Notice को बारेमा लेखनुहोस्"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inventory">Select Category<span class="text-danger">*</span></label>
                                <select id="inventory" class="form-control" name="inventory_id">
                                    @foreach ($inventory as $inventory)
                                        <option value="{{ $inventory->id }}">{{ $inventory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input id="image" class="form-control-file" type="file" name="image"
                                    title="कृपया image छान्नुहोस">
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Save Record</button>
                </form>
            </div>
        </div>
    </div>
</x-frontend-template>
