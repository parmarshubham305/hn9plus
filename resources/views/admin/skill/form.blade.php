<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Skill Type</label>
		<div class="col-sm-8">
			{{ Form::select('type', Helper::getEnumValues('skills', 'type'), old('type'), ['class' => 'form-control', 'placeholder' => 'Select Skill Type' ]) }}
		<span class='text-danger'>{{ $errors->first('type') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Parent Skill</label>
		<div class="col-sm-8">
			{{ Form::select('parent_id', $skills, old('parent_id'), ['class' => 'form-control', 'placeholder' => 'Select Parent Skill' ]) }}
		<span class='text-danger'>{{ $errors->first('parent_id') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Title</label>
		<div class="col-sm-8">
			{{ Form::text('title', old('title'), ['class' => 'form-control', 'required' ]) }}
		<span class='text-danger'>{{ $errors->first('title') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Description</label>
		<div class="col-sm-8">
			{{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 5 ]) }}
		<span class='text-danger'>{{ $errors->first('description') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Price</label>
		<div class="col-sm-8">
			{{ Form::text('price', old('price'), ['class' => 'form-control', 'required', 'placeholder' => 'Price value allowed to two decimal values - Ex. 10.10' ]) }}
		<span class='text-danger'>{{ $errors->first('price') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Logo</label>
		<div class="col-sm-3">
			{{ Form::file('logo', old('logo'), ['class' => 'form-control' ]) }}
			<span class='text-danger'>{{ $errors->first('logo') }}</span>
		</div>
		<div class="col-sm-2">
			@if(isset($data) && $data['logo'])
				<div class="image-area">
					<img src="{{ asset($data['logo']) }}" alt="Preview">
					<!-- <a onclick="removeProfile({{ $data['logo'] }})" class="remove-image" href="#" style="display: inline;">&#215;</a> -->
				</div>
			@endif
		</div>
	</div>
</div>
<div class="box-body">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-4 control-label">Status</label>
		<div class="col-sm-8" style="padding-top: 10px;">
		{{ Form::checkbox('status', old('status')) }}
		<span class='text-danger'>{{ $errors->first('status') }}</span>
		</div>
	</div>
</div>
<div class="box-body">
</div>
<div class="box-footer text-center">
	<a type="button" href="{{ route('admin.skills.index') }}" class="btn btn-flat btn-default">Cancel</a>
	<button type="submit" class="btn btn-flat btn-primary">Save</button>
</div>

