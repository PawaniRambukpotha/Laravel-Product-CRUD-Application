@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Product List</h1>
        </div>
        <div class="col-lg-12">
            <form role="form" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" name="name" type="text" placeholder="Enter product Name" required>
                        </div>
                        <div class="mt-5 form-group">
                            <input class="form-control dropify" name="images" type="file"
                                accept="image/jpg, image/jpeg, image/png" required>
                        </div>
                        <div class="mt-5 form-group">
                            <input class="form-control" name="price" type="decimal" placeholder="Enter product Price" required>
                        </div>
                    </div>
                    <div class="mt-4 text-center col-lg-8">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $product->name }}</td>
                            <td><img src="{{ config('images.access_path') }}/{{ $product->images->name }}" width="100px" height="60px"></td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if ($product->status == 0)
                                    <span class="badge bg-warning">Inactive</span>
                                @else
                                    <span class="badge bg-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-pencil-alt"  onclick="productEditModal({{ $product->id }})"></i></a>
                                <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                @if($product->status ==0)
                                <a href="{{ route('product.status',$product->id) }}" class="btn btn-success"><i class="fa fa-check-circle"></i></a>
                                @else
                                <a href="{{ route('product.status',$product->id) }}" class="btn btn-warning"><i class="fa fa-check-circle"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="productEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="productEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productEditLabel">Edit Exiting Product</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="productEditContent">

        </div>
      </div>
    </div>
</div>

@endsection

@push('css')
<style>
    .page-title{
        padding-top: 5vh;
        font-size: 5rem;
        color: #4bbfac;
    }

    .dropify-message p{
        font-size: 2rem;
    }

    .dropify-render img{
        margin: auto;
    }

</style>
@endpush

@push('js')
<script>
    $('.dropify').dropify();
</script>
@endpush

@push('js')
<script>
    function productEditModal(product_id){
        var data = {
            product_id: product_id,
        };
        $.ajax({
            url: "{{ route('product.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response) {
                $('#productEdit').modal('show');
                $('#productEditContent').html(response);
            }
        });
    }
</script>
@endpush
