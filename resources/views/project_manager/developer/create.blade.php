@extends('project_manager.layouts.layout')
@section('content')
<section class="content-header">
	<h1>
		Developer
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('project_manager.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ route('project_manager.developers.index') }}">Developer</a></li>
		<li class="active">Create</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Create</h3>
            </div>
			{{ Form::open(['url' => route('project_manager.developers.store'), 'class' => 'form-horizontal', 'files' => true]) }}
              @include('project_manager.developer.form')
            {{ Form::close() }}
          </div>
        </div>
	</div>
</section>
@stop

