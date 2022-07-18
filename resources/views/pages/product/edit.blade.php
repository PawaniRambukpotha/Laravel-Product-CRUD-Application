<form role="form" action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="name" value="{{ $product->name }}" type="text" placeholder="Enter product Name" required>
            </div>
            <div class="mt-5 form-group">
                <input class="form-control dropify" name="images" type="file" value="{{ $product->images }}"
                    accept="image/jpg, image/jpeg, image/png">
            </div>
            <div class="mt-5 form-group">
                <input class="form-control" name="price" value="{{ $product->price }}" type="decimal" placeholder="Enter product Price" required>
            </div>
        </div>
        <div class="mt-4 text-center col-lg-8">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
</form>
