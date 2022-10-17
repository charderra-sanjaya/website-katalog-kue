@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    

    {{-- Start About --}}

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="">Kue Pie Susu </h1>
                <h3 class="Brand">Mugi Lestari</h3>
                <div class="d-flex">
                    <div class="p-4">
                        <h4 class="fw-bold">10+</h4>
                        <p>Variant Rasa</p>
                    </div>
                    <div class="p-4">
                        <h4 class="fw-bold">20+</h4>
                        <p>Outlets</p>
                    </div>
                    
                </div>  
            </div>
            <div class="col-md-6">
                <img class="img-fluid hero-image" src="{{url('img/Hero Produk.jpg')}}" alt="Mugi Lestari">
            </div>
        </div>
    </div>
    {{-- end about --}}

    {{-- Start About --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid hero-image" src="{{url('img/hero Produk 2.jpg')}}" alt="Mugi Lestari">
            </div>

            <div class="col-md-6">
                <h3 class="">Tentang Kami </h3>
                <h3 class="Brand">Mugi Lestari</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus animi repellendus laborum in est quas facilis esse eum vero nisi, et modi dolores dolorum unde dolore ipsam porro assumenda quidem?</p> 
            </div>
            
        </div>
    </div>
    {{-- end about --}}
    <div class="container mt-5">
        <h1>Gallery</h1>
        <hr>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{url('img/Group 1.png')}}" class="d-block rounded-3 w-100" alt="...">
              </div>
              
              
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>

    {{-- End Carousel --}}

    {{-- Start Product --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class=" text-center">Produk Kami Segera Tersedia di</h1>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 text-center mt-3">
            <div class="col-md-6">
                <div class="div">
                    <a href="https://shopee.co.id"><img class="img-fluid" src="{{url('img/shopee.png')}}" alt="">
                    </a> 
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="div">
                    <img class="img-fluid" src="{{url('img/tokopedia.png')}}" alt="">
                </div>
            </div>
    </div>
    {{-- end product --}}

    
@endsection