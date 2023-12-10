@extends('admin.layouts.layout')
@section('content')
<section class="content-header">
	<h1>
		SEO
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ route('admin.seos.index') }}">SEO</a></li>
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
			{{ Form::open(['url' => route('admin.seos.store'), 'class' => 'form-horizontal']) }}
              @include('admin.seo.form')
            {{ Form::close() }}
          </div>
        </div>
	</div>
</section>
@stop

