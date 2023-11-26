@extends('developer.layouts.layout')
@section('content')
<div class="container spacing-y">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-12">
            <div class="border border-2 bg-white rounded-3 p-lg-5 p-3">
                <div class="text-center mb-5">
                    <img src="{{ asset('frontend/images/logo.png') }}" height="103" width="171" alt="logo">
                </div>
                <form method="POST" action="{{ route('developer.login') }}" class="text-center m-auto p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="exampleInputEmail1" class="form-label fs-5 mb-0">Email Address</label>
                        {{ Form::email('email', old('email'), ['placeholder' => 'Email ID', 'class' => 'form-control border rounded-3 py-3',  'aria-describedby'=> 'emailHelp', 'required']) }}
                        @error('email')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="exampleInputPassword1" class="form-label fs-5 mb-0">Password</label>
                        {{ Form::password('password', ['class' => 'form-control border rounded-3 py-3', 'placeholder' => 'Password']) }}
                        @error('password')
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="text-center pt-5">
                        <button type="submit" class="btn btn-secondary fs-5 px-5 py-2">Login</button>
                    </div>
                </form>
            </div> 
        </div>
    </div>
</div>
@endsection
