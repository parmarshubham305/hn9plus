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
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Designation</label>
		<div class="col-sm-8">
			{{ Form::text('designation', old('designation'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('designation') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Skill</label>
		<div class="col-sm-8">
			{{ Form::select('skills[]', $skills, old('skills'), ['class' => 'form-control', 'required', 'placehlder' => 'Select Skills', 'multiple' ]) }}
		<span class='text-danger'>{{ $errors->first('skills') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">About</label>
		<div class="col-sm-8">
			{{ Form::textarea('summary', old('summary'), ['class' => 'form-control', 'required', 'rows' => 5 ]) }}
		<span class='text-danger'>{{ $errors->first('summary') }}</span>
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Address</label>
		<div class="col-sm-8">
			{{ Form::textarea('address', old('address'), ['class' => 'form-control', 'required', 'rows' => 5 ]) }}
		<span class='text-danger'>{{ $errors->first('address') }}</span>
		</div>
	</div>
</div>

<livewire:backend.developer-form :experiences="isset($data) ? $data['experience'] : []" :educations="isset($data) ? $data['education'] : []" />
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Profile Photo</label>
		<div class="col-sm-3" style="padding-top: 10px;">
			{{ Form::file('image', old('image'), ['class' => 'form-control' ]) }}
			<span class='text-danger'>{{ $errors->first('image') }}</span>
		</div>
		<div class="col-sm-2">
			@if(isset($data) && $data['image'])
				<div class="image-area">
					<img src="{{ asset($data['image']) }}" height="100" width="100" alt="Preview">
					<!-- <a onclick="removeProfile({{ $data['image'] }})" class="remove-image" href="#" style="display: inline;">&#215;</a> -->
				</div>
			@endif
		</div>
	</div>
</div>
<div class="box-body col-md-6">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Phone</label>
		<div class="col-sm-8">
			{{ Form::text('contact_number', old('contact_number'), ['class' => 'form-control']) }}
		<span class='text-danger'>{{ $errors->first('contact_number') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
</div>
<div class="box-footer text-center">
	<a type="button" href="{{ route('admin.developers.index') }}" class="btn btn-flat btn-default">Cancel</a>
	<button type="submit" class="btn btn-flat btn-primary">Save</button>
</div>

