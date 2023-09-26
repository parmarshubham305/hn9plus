<div class="container">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('frontend/images/logo.png') }}" alt="site-logo" class="img-fluid" width="120">
    </a>
    <button class="navbar-toggler collapsed border-0" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="hamburger-menu">
            <span class="bar-top"></span>
            <span class="bar-middle"></span>
            <span class="bar-bottom"></span>
        </span>
    </button>
    <div class="collapse navbar-collapse h-100" id="navbarNav">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Our Site</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Our Service </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
            </li>
        </ul>
    </div>
    <ul class="list-unstyled list-inline d-md-inline-block d-none mb-0 nav-icons">
        <li class="list-inline-item search">
            <a class="nav-link search-btn" href="#"><span class="fa-lg icon-search custom"></span></a>
            <span class="search-bar">
                <input class="form-control border " type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary rounded-0" type="submit"><span class="fa-lg icon-Search custom ms-0 fs-6"></span></button>
            </span>
        </li>
        <li class="list-inline-item">
            <a class="nav-link" href="#"><span class="fa-lg icon-Chat custom"></span></a>
        </li>
        <li class="list-inline-item">
            <a class="nav-link" href="#"><span class="fa-lg icon-cart custom"></span></a>
        </li>
        <li class="list-inline-item">
            @if(!$user)
                <a class="nav-link" onclick="Livewire.emit('openModal', 'front.login')"><span class="fa-lg icon-user custom"></span></a>
            @else
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link">
                    <span class="fa-lg icon-user custom"> {{ Auth::user()->first_name }}, Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </li>
    </ul>
</div>