@extends('project_manager.layouts.layout')
@section('content')
<section class="content-header">
	<h1>
		User
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('project_manager.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ route('project_manager.users.index') }}">User</a></li>
		<li class="active">Create</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-8">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create</h3>
            </div>
    				{{ Form::open(['url' => route('project_manager.users.store'), 'class' => 'form-horizontal', 'files' => true]) }}
              @include('project_manager.user.form')
            {{ Form::close() }}
          </div>
        </div>
	</div>
</section>
@stop

