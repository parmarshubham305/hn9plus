<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Name</label>
		<div class="col-sm-8">
			{{ Form::text('name', old('name'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('name') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Email</label>
		<div class="col-sm-8">
			{{ Form::email('email', old('email'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('email') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Password</label>
		<div class="col-sm-8">
			{{ Form::text('password', old('password'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('password') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
</div>
<div class="box-footer text-center">
	<a type="button" href="{{ route('admin.developers.index') }}" class="btn btn-flat btn-default">Cancel</a>
	<button type="submit" class="btn btn-flat btn-primary">Save</button>
</div>

