@extends('frontend.layouts.layout')
@section('content')
<section class="py-4">
    <div class="register_form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="bg-white p-lg-5 p-md-4 p-3 rounded-3 ">
                                <h1 class="text-primary mb-0">Welcome User</h1>
                                <p class="mb-lg-5 mb-md-4 mb-3 text-secondary">Register for new account</p>
                                <form class="step-content demo-form" action="{{ route('register') }}" method="post" role="form">
                                    @csrf
                                    <div class="mb-md-4 mb-3">
                                        {{ Form::text('first_name', old('first_name'), ['placeholder' => 'First Name', 'class' => 'form-control', 'required']) }}
                                        @error('first_name')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-md-4 mb-3">
                                        {{ Form::text('last_name', old('last_name'), ['placeholder' => 'Last Name', 'class' => 'form-control', 'required']) }}
                                        @error('last_name')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-md-4 mb-3">
                                        {{ Form::email('email', old('email'), ['placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
                                        @error('email')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-md-4 mb-3">
                                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                                        @error('password')
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3 mb-md-4 mb-lg-5">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required />
                                    </div>
                                    <div class="mb-md-4 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                I’m Agreed with <a href=""><u>Terms and Condition</u></a>
                                            </label>
                                            </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-secondary px-5 py-2">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 text-center">
                            <img class="img-fluid" src="{{ asset('frontend/images/register_img.png') }}" alt="register_img" width="529" height="545">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
