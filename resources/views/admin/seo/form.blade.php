<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Path</label>
		<div class="col-sm-8">
			{{ Form::text('path', old('path'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('path') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Title</label>
		<div class="col-sm-8">
			{{ Form::text('title', old('title'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('title') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Description</label>
		<div class="col-sm-8">
			{{ Form::textarea('description', old('description'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('description') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
</div>
<div class="box-footer text-center">
	<a type="button" href="{{ route('admin.seos.index') }}" class="btn btn-flat btn-default">Cancel</a>
	<button type="submit" class="btn btn-flat btn-primary">Save</button>
</div>

