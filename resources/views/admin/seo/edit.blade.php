@extends('admin.layouts.layout')
@section('content')
<section class="content-header">
	<h1>
		SEO
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="{{ route('admin.seos.index') }}">SEO</a></li>
		<li class="active">Edit</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit</h3>
            </div>
            {{ Form::model($data,['route' => ['admin.seos.update', $data['id']], 'method' => 'PATCH', 'class' => 'form-horizontal']) }}
            <input type="hidden" name="id" value="{{ $data['id'] }}">
            @include('admin.seo.form')
            {{ Form::close() }}
          </div>
        </div>
	</div>
</section>
@stop

