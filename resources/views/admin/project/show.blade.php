@extends('admin.layouts.layout')
@section('content')
<section class="content-header">
    <h1>
        Quote
        <!-- <small>#007612</small> -->
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('admin.projects.index') }}">Quotes</a></li>
        <!-- <li class="active">Invoice</li> -->
    </ol>
</section>
<section class="invoice">

    <div class="row">
        <div class="col-xs-12">
            <h2 class="page-header">
                <i class="fa fa-globe"></i> {{ $data['user']['first_name'] }} {{ $data['user']['last_name'] }}
                <small class="pull-right">Quote: {{ $data['quote_type'] }}</small>
            </h2>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-4">
            <p class="lead">
                <img src="{{ asset($data['file']) }}" height="250"/>
            </p>
        </div>
        <div class="col-xs-8">
            <div class="row">
            <div class="col-xs-4">
            <p class="lead">Details</p>
            </div>
            <div class="col-xs-8">
            {{ Form::model($data,['route' => ['admin.projects.update', $data['id']], 'method' => 'PATCH', 'class' => 'form-horizontal', 'files' => true]) }}
            <input type="hidden" name="id" value="{{ $data['id'] }}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Manager</label>
                        <div class="col-sm-8">
                            {{ Form::select('project_manager_id', $projectManagers, old('project_manager_id'), ['class' => 'form-control', 'id' => 'project_manager_id', 'placeholder' => 'Assign Manager' ]) }}
                        <span class='text-danger'>{{ $errors->first('project_manager_id') }}</span>
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
            </div>    
        </div>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Title:</th>
                        <td>{{ $data['title'] }}</td>
                    </tr>
                    <tr>
                        <th>Skills</th>
                        <td>
                            @if($skills)
                                @foreach($skills as $key => $skill)
                                    {{ $skill }} @if(array_key_last($skills) != $key) , @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Timeline</th>
                        <td>{{ $data['timeline'] }}</td>
                    </tr>
                    @if($data['experience_level'])
                    <tr>
                        <th>Experience Level</th>
                        <td>{{ $data['experience_level'] }}</td>
                    </tr>
                    @endif
                    @if($data['estimated_price'])
                    <tr>
                        <th>Estimated Price</th>
                        <td>{{ $data['estimated_price'] }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Payment Type</th>
                        <td>{{ $data['payment_type'] }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $data['description'] }}</td>
                    </tr>
                </table>
            </div>
            
        </div>

    </div>

    <!-- <div class="row no-print">
        <div class="col-xs-12">
            <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
            </button>
        </div>
    </div> -->
</section>
<div class="clearfix"></div>
@stop
@section('js')
<script>
    var select = document.getElementById('project_manager_id');
    select.addEventListener('change', function(){
        this.form.submit();
    }, false);
</script>
@stop