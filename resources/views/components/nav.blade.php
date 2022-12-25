<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('student') }}">Student Entry</a>
          </li>
        </ul>
        {{-- Authentication --}}
        @if (Auth::user())
          <form method="POST" action="{{ route('logout') }}">
          @csrf
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <x-jet-dropdown-link href="{{ route('logout') }}"
            onclick="event.preventDefault();
              this.closest('form').submit();">
              <span><a class="nav-link active" aria-current="page" href="{{ __('Log Out') }} "><button type="logout" class="btn btn-outline-secondary" style="--bs-btn-padding-y: .3rem; --bs-btn-padding-x: .7rem; --bs-btn-font-size: .9rem;">Log Out</button></a></span>
          </x-jet-dropdown-link>
        </div>
          </form>
        @else
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <span><a class="nav-link active" aria-current="page" href="{{ route('login') }}"><button type="login" class="btn btn-outline-primary" style="--bs-btn-padding-y: .3rem; --bs-btn-padding-x: 1rem; --bs-btn-font-size: .9rem;">Login</button></a></span>
        <span><a class="nav-link active" aria-current="page" href="{{ route('register') }}"><button type="register" class="btn btn-outline-secondary" style="--bs-btn-padding-y: .3rem; --bs-btn-padding-x: 1rem; --bs-btn-font-size: .9rem;">Register</button></a></span>
      </div>
        @endif


        
        
      </div>
    </div>
  </nav>