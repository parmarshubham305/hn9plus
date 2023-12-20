@extends('frontend.layouts.layout')
@section('content')
<div class="horly-section spacing-y">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-5">
                <div class="section-header mb-4 pb-2">
                    <h1 class="mb-0">Fixed Rate</h1>
                </div>
                <p>A fixed-price contract is a project delivery method where the contractor agrees to deliver a specified scope of work for a predetermined price, regardless of the actual costs or duration of the project.</p>
            </div>
            <div class="col-md-6">
                <div class="cutom_form">
			        {{ Form::open(['url' => route('front.fixed-rate.store'), 'class' => 'mt-md-5 mt-3', 'files' => true]) }}
                        <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Job Title <span class="text-danger">*</span></h3>
                            {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Job Title']) }}
                            <span class='text-danger'>{{ $errors->first('title') }}</span>
                        </div>
                        <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Technology <span class="text-danger">*</span></h3>
                            {{ Form::select('skills[]', ['' => 'Select'] + $skills, old('skills'), ['class' => 'form-select cutom-select multiselect border-0 border-bottom rounded-0 ps-1', 'data-allow-clear' =>"1", 'multiple' => true]) }}
                            <span class='text-danger'>{{ $errors->first('skills') }}</span>
                        </div>
                        <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Project Timeline <span class="text-danger">*</span></h3>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    {{Form::radio('timeline','< 3 Months', true, ['class'=>'form-check-input', 'id' => '3_month'])}}
                                    {{ Form::label('3_month', '< 3 Months', ['class' => 'form-check-label']) }}
                                </div>
                                <div class="form-check me-3">
                                    {{Form::radio('timeline','3 - 6 Months', '', ['class'=>'form-check-input', 'id' => '3_6_Months'])}}
                                    {{ Form::label('3_6_Months', '3 - 6 Months', ['class' => 'form-check-label']) }}
                                </div>
                                <div class="form-check me-3">
                                    {{Form::radio('timeline','> 6 months', '', ['class'=>'form-check-input', 'id' => '6_months'])}}
                                    {{ Form::label('6_months', '> 6 months', ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                            <span class='text-danger'>{{ $errors->first('timeline') }}</span>
                        </div>
                        <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Job Description <span class="text-danger">*</span></h3>
                            {{ Form::textarea('description', old('description'), ['class' => 'form-control', 'rows' => 5]) }}
                            <span class='text-danger'>{{ $errors->first('description') }}</span>
                        </div>
                            <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Estimated Price <small class="text-muted">(Price is in Dollor)</small> </h3>
                            {{ Form::number('estimated_price', old('estimated_price'), ['class' => 'form-control', 'placeholder' => 'Estimated Price (optional)']) }}
                        </div>
                        <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Payment Milestone <span class="text-danger">*</span></h3>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    {{Form::radio('payment_type','Weekly', true, ['class'=>'form-check-input', 'id' => 'weekly'])}}
                                    {{ Form::label('weekly', 'Weekly', ['class' => 'form-check-label']) }}
                                    <small class="text-muted  d-block">(5 days working Excl. Sat & Sun)</small>
                                </div>
                                <div class="form-check me-3">
                                    {{Form::radio('payment_type','Monthly', true, ['class'=>'form-check-input', 'id' => 'monthly'])}}
                                    {{ Form::label('monthly', 'Monthly', ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                            <span class='text-danger'>{{ $errors->first('payment_type') }}</span>
                        </div>
                        <div class="mb-md-4 mb-3">
                            <h3 class="mb-2">Upload File(.JPG, .PNG, .MP4, PDF)</h3>
                            <div class="input-group mb-3">
                                <label class="btn btn-outline-primary px-4" for="upload">Upload File</label>
                                {{ Form::file('file', ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="pt-3">
                            <button type="submit" class="btn btn-primary btn-lg px-md-5 text-white">Submit</button>
                        </div>
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet"> 
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@stop