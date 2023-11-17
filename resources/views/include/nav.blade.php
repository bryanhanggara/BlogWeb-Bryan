<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
    <img src="{{url('blog_fe/image/logo.png')}}" alt="" class="navbar-brand" style="height: 50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        <a class="nav-link" href="{{route('blog')}}">Blog</a>
        @if(auth()->check() && auth()->user()->roles == 'ADMIN')
            <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
        @endif
        @guest
            <a href="{{route("login")}}" class="nav-link">Login</a>
        @endguest
        @auth
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endauth
        </div>
    </div>
    </div>
</nav>