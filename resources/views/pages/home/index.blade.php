@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Home Page</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($products as $product)
            <div class="col-lg-4" style="padding-bottom: 10vh;">
                <div class="card" style="width: 18rem;">
                    <img src="{{ config('images.access_path') }}/{{ $product->images->name }}" alt="product image" class="product-image card-img-top">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      <p class="card-text">{{ $product->price }}</p>
                    </div>
                  </div>

            </div>
            @empty
            <div class="col-lg-12">
                <h2 class="text-danger">No Product Found</h2>
            </div>
            @endforelse
        </div>
    </div>
@endsection

@push('css')
<style>
    .page-title{
        padding-top: 10vh;
        padding-bottom: 9vh;
        font-size: 5rem;
        color: #4b85bf;
    }
    .product-image{
        max-height: 18rem;
        max-width: 18rem;
    }
</style>
@endpush

