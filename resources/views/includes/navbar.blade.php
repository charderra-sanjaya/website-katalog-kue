<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">Mugi Lestari</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold {{ (request()->is('/')) ? 'active' : '' }}" href="{{route('home')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold {{ (request()->is('katalog')) ? 'active' : '' }}" href="{{route('katalog')}}">Katalog</a>
          </li>
          @auth
          <li class="nav-item dropdown">
              <a class="nav-link btn btn-info text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi, {{ Auth::user()->name }}
              </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            
          </ul>
        </li>
       @endauth
        </ul> 
        
      </div>
    </div>
  </nav>

</div>