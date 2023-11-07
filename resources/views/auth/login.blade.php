@extends('frontend.layouts.layout')
@section('content')
<!-- <div class="login-page spacing-y">
<div class="d-flex justify-content-center align-items-center position-relative h-100">
    <div class="sign-in-form">
    <form method="POST" action="{{ route('login') }}" class="text-center m-auto p-4">
        @csrf
        <img src="{{ env('APP_URL').'front/images/site_logo.png' }}" alt="site_logo" class="my-4 img-fluid">
        <div class="d-flex form-group mb-3">
        <span class="square-icon"><i class="fas fa-user"></i></span>
        <input id="email" type="email" placeholder="Username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>
    @error('email')
        <span class="" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <div class="d-flex form-group mb-3">
        <span class="square-icon"> <i class="fas fa-lock"></i></span>
        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <button type="submit" class="btn btn-info mt-3 px-4">Login </button>
        <a href="{{ route('password.request') }}" class="btn btn-link d-block text-center mb-2">Forget Password</a>
    </form>
    <div class="content text-center">
        <h4 class="text-white">New Here ?</h4>
        <p class="text-white">
        Create new accout with us!!
        </p>
        <a href="{{ route('register') }}" class="btn btn-primary px-4 " id="signUpbtn">
        Register
        </a>
    </div>
    </div>
</div>
</div> -->

<section class="spaceing_class">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="login shadow bg-primary rounded-3 overflow-hidden">
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <h2 class="text-white pb-lg-0 pb-0 p-lg-5 p-3">Welcome to HN9+</h2>
                            <div id="carouselExampleIndicators" class="carousel slide p-lg-5 p-3 pt-lg-0 pt-0"
                                data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        
                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint aliquid
                                            placeat dolorum? Obcaecati autem, deserunt nostrum assumenda maiores
                                            rerum aut! Earum tempora nobis vero dicta quaerat deserunt eveniet sint
                                            repellendus.</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                                            explicabo sequi magnam minus quae officiis excepturi et rerum. Deleniti
                                            impedit aliquid est, vel quam officiis harum itaque similique voluptas
                                            eligendi!</p>
                                    </div>
                                    <div class="carousel-item">
                                        <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                                            explicabo sequi magnam minus quae officiis excepturi et rerum. Deleniti
                                            impedit aliquid est, vel quam officiis harum itaque similique voluptas
                                            eligendi!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-lg-5 p-3 bg-white overflow-hidden h-100">
                                <h1 class="mb-lg-5 mb-md-4 mb-3">Login</h1>
                                <form method="POST" action="{{ route('login') }}" class="text-center m-auto p-4">
                                    @csrf
                                    <div class="mb-lg-5 mb-md-4 mb-3">
                                        {{ Form::email('email', old('email'), ['placeholder' => 'Email ID', 'class' => 'form-control px-1', 'required']) }}
                                        @error('email')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-md-4 mb-3 mb-lg-5">
                                        {{ Form::password('password', ['class' => 'form-control px-1', 'placeholder' => 'Password']) }}
                                        @error('password')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="text-center mb-md-4 mb-3 mb-lg-5">
                                        <button type="submit" class="btn btn-secondary px-4">Log In</button>
                                    </div>
                                </form>
                                <div class="text-center right_section">
                                    <p class="mb-3">Don't have account? - <a href="{{ route('register') }}">Register Now</a></p>
                                    <p class="mb-3">or</p>
                                    <a href="{{ url('authorized/google') }}"><img class="img-fluid" src="{{ asset('frontend/images/Googel_icon.png') }}" alt="google_icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
