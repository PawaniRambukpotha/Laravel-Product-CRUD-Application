<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('product') }}">Product List</a>
          </li>
        </ul>
        @if (Auth::user())
        <form action="{{ route('logout') }}" method="post">
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>
        @else
        <span><a href="{{ route('login') }}">Login</a></span> || <span><a href="{{ route('register') }}">Register</a></span>
        @endif

      </div>
    </div>
  </nav>
