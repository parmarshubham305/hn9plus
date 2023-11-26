@extends('project_manager.layouts.layout')
@section('content')
<section class="content-header">
    <h1>
        Create Chat
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Create</h3>
                </div>
                {{ Form::open(['url' => route('project_manager.chats.store'), 'class' => 'form-horizontal', 'files' => true]) }}
                <div class="box-body col-md-6">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Chat Title</label>
                        <div class="col-sm-8">
                            {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Enter Title', 'required' ]) }}
                            <span class='text-danger'>{{ $errors->first('title') }}</span>
                        </div>
                    </div>
                </div>
                <div class="box-body col-md-6">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Project</label>
                        <div class="col-sm-8">
                            {{ Form::select('project_id', $projects, old('project_id'), ['class' => 'form-control', 'placeholder' => 'Select Project', 'required' ]) }}
                            <span class='text-danger'>{{ $errors->first('project_id') }}</span>
                        </div>
                    </div>
                </div>
                <div class="box-body col-md-6">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Developer</label>
                        <div class="col-sm-8">
                            {{ Form::select('developer_id', $developers, old('developer_id'), ['class' => 'form-control', 'placeholder' => 'Select Developer', 'required' ]) }}
                            <span class='text-danger'>{{ $errors->first('developer_id') }}</span>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                </div>
                <div class="box-footer text-center">
                    <a type="button" href="{{ route('project_manager.developers.index') }}" class="btn btn-flat btn-default">Cancel</a>
                    <button type="submit" class="btn btn-flat btn-primary">Save</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop