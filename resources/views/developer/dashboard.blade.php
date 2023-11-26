@extends('developer.layouts.layout')
@section('content')
<div class="row">
    <div class="col-12 mb-5 px-0">
        <img class="img-fluid" src="images/admin/dashboard.png" alt="">
    </div>
    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
        <a href="#" class="border rounded-4 bg-light-blue position-relative overflow-hidden w-100 h-100">
            <span class="dashboard_card_header bg-cercle-blue d-inline-block">
                <h4 class="mb-0">23</h4>
            </span>
            <span class="text-end d-block">
                <h3 class="px-3 fw-bold text-secondary">Active Project</h3>
            </span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
        <a href="#" href="#" class="border rounded-4 bg-light-yellow position-relative overflow-hidden w-100 h-100
                        w-100 h-100">
            <span class="dashboard_card_header bg-cercle-yellow d-inline-block">
                <h4 class="mb-0">10</h4>
            </span>
            <span class="text-end d-block">
                <h3 class="px-3 fw-bold text-primary">Active Tickets</h3>
            </span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
        <a href="#" class="border rounded-4 bg-light-blue position-relative overflow-hidden w-100 h-100">
            <span class="dashboard_card_header bg-cercle-blue d-inline-block">
                <h4 class="mb-0">10</h4>
            </span>
            <span class="text-end d-block">
                <h3 class="px-3 fw-bold text-secondary">Total Projects</h3>
            </span>
        </a>
    </div>
    <div class="col-lg-3 col-md-6 mb-lg-0 mb-4">
        <a href="#" class="border rounded-4 bg-light-yellow position-relative overflow-hidden w-100 h-100
                        w-100 h-100">
            <span class="dashboard_card_header bg-cercle-yellow d-inline-block">
                <h4 class="mb-0">200</h4>
            </span>
            <span class="text-end d-block">
                <h3 class="px-3 fw-bold text-primary">Total Tickets</h3>
            </span>
        </a>
    </div>
</div>
@stop