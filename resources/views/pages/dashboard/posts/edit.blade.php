@extends('layouts.admin')

@section('title')
    Edit Post Dashboard
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Produk</h2>
        <p class="dashboard-subtitle">
           Edit Postingan Produk
        </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <form action="{{ route('posts.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name" value="{{old('name', $product->name)}}"/>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}

                        </div>
                    @enderror
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Slug</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"  value="{{old('slug',$product->slug)}}"  />
                    </div>
                    <small>Note: Jika Slug tidak dapat generate Otomatis, disarankan load atau refresh halaman , agar slug dapat digenerate dengan otomatis</small>
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}

                        </div>
                    @enderror
                  </div>    

                  <div class="col-md-12 ">
                    <div class="form-group">
                      <label for="formFile">Gambar Sampul</label>
                        
                        <input class="form-control" type="file" id="formFile" name="image" @error('image') is-invalid @enderror>
                    </div>
                    
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}

                        </div>
                    @enderror
                  </div>

                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <label for="body">Artikel / body</label>
                      <input type="hidden" class="form-control" id="body" name="description" required value="{{old('description', $product->description)}}" />
                      <trix-editor input="body"></trix-editor>
                    </div>
                  </div>
                  
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
   const title = document.querySelector("#title");
    const slug = document.querySelector("#slug");

        title.addEventListener("change", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g,"-");
            slug.value = preslug.toLowerCase();
        });

      document.addEventListener("trix-file-accept", function(event) {
        event.preventDefault();
      })
</script>
@endsection