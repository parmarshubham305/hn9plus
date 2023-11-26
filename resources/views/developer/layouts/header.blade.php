<div class="bg-white p-4 d-flex justify-content-between">
    <button id="toggle" type="button" class="navbar-toggler ">
        <span class="line-one"></span>
        <span class="line-two"></span>
        <span class="line-three"></span>
    </button>
    <div class="dropdown">
        <a class="btn border-0 dropdown-toggle fs-5" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Hello, {{ Auth::guard('developer')->user()->name }} <i class="custom icon-emp-user fa-lg ms-2"></i> </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('developer.logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
        </ul>
    </div>
</div>