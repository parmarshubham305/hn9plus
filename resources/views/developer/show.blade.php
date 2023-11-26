@extends('developer.layouts.layout')
@section('content')
<div class="employee_profile">
    <div class="col-12 mb-5 px-0">
        <img class="img-fluid" src="{{ asset('frontend/images/user_banner.png') }}" alt="">
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="shadow employee_profile_photo">
                <img src="" alt="">
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-4 mb-2">
                    <h4><strong>Name</strong></h4>
                    <p>{{ $data['name'] }}</p>
                </div>
                <div class="col-4 mb-2">
                    <h4><strong>Employee ID</strong></h4>
                    <p>#{{ $data['id'] }}</p>
                </div>
                <div class="col-4 mb-2">
                    <h4><strong>Designation</strong></h4>
                    <p>{{ $data['designation'] }}</p>
                </div>
                <div class="col-4 mb-2">
                    <h4><strong>Email</strong></h4>
                    <p>{{ $data['email'] }}</p>
                </div>
                <div class="col-4 mb-2">
                    <h4><strong>Contact Number</strong></h4>
                    <p>{{ $data['contact_number'] }}</p>
                </div>
                <div class="col-4 mb-2">
                    <h4><strong>Address</strong></h4>
                    <p>{{ $data['address'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@stop