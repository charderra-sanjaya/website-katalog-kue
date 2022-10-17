@extends('layouts.admin')

@section('title')
    Katalog Dashboard
@endsection

@section('content')
 <!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Katalog Produk</h2>
        <p class="dashboard-subtitle">
            List Produk
        </p>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{  route('posts.create') }}" class="btn btn-primary mb-3">
                            + Tambah Produk Baru
                        </a>
                        
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Foto</th>
                                    <th>Bagikan postingan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$post->name}}</td>
                                        <td><img src="{{asset('storage/'. $post->image)}}" alt="" style="width: 50px; height: 50px"></td>
                                        
                                        <td>
                                            <input style="display: none"  type="text" value="{{url('blog/'.auth()->user()->id, $post->slug )}}" id="link{{$post->id}}" readonly>
                                            <button class="btn btn-warning" onclick="copyLink({{$post->id}})">
                                                Bagikan
                                                
                                            </button>
                                        </td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                                    type="button" id="action {{ $post->id}} "
                                                        data-bs-toggle="dropdown" 
                                                        aria-haspopup="true"
                                                        aria-expanded="false">
                                                        Aksi
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="action {{ $post->id}}">
                                                    <a class="dropdown-item" href=" {{route('posts.edit', $post->id)}} ">
                                                        Sunting
                                                    </a>
                                                    <form action=" {{route('posts.destroy', $post->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Apakah yakin ingin hapus postingan?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                    </td>
                                      </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function copyLink(id) {
        /* Get the text field */
        var copyText = document.getElementById("link"+id);
      
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
      
         /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
      
        /* Alert the copied text */
        alert(" Men-salin Text: " + copyText.value);
      }

</script>
@endsection