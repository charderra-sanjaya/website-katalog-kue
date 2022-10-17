@extends('layouts.app')

@section('title')
    Katalog
@endsection

@section('content')

<div class="container mt-3">
    <h1>Katalog</h1>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 mt-4">
      @forelse ($products as $product)
        <div class="col-md-4">
            <div class="card shadow ">
                <img class="card-img-top" src="{{asset('storage/'. $product->image)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $product->name}}</h5>
                    <a href="{{url('/katalog/detail/'. $product->slug)}}" class="btn btn-primary mt-3">Detail Produk <i class="bi bi-chevron-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-md-12">
        <p class="text-center fw-bold text-danger fs-2">No Post Found</p>
    </div>
    @endforelse

    
</div>


@endsection