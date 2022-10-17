@extends('layouts.app')

@section('title')
    Detail Katalog
@endsection

@section('content')
<div class="container">
    <h1>Detail Katalog</h1>
    <div class="card shadow mb-3 mt-5" >
        <div class="row g-0">
        <div class="col-md-6">
            <img src="{{asset('storage/'. $products->image)}}" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-6">
            <div class="card-body">
            <h5 class="card-title fw-bold">{{$products->name}}</h5>
            
            <small class="mt-2">Deskripsi:</small>
            <p class="card-text">{!! $products->description !!}</p>
           
            </div>
        </div>
        </div>
    </div>
</div>
@endsection