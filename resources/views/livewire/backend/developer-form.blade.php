<div>
    <div class="box-body col-md-12">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Experiece</label>
            <div class="col-sm-10">
                @foreach($experiences as $key => $experience)
                    <div class="row mb-5" style="margin-bottom: 5px;">
                        <div class="col-sm-3">
                            <input type="text" wire:model="experiences.{{ $key }}.company" class="form-control" placeholder="Company Name"/>
                        </div>
                        <div class="col-sm-3">
                            <textarea wire:model="experiences.{{ $key }}.description" class="form-control" placeholder="Summary"></textarea>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" wire:model="experiences.{{ $key }}.from_date" class="form-control"/>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" wire:model="experiences.{{ $key }}.to_date" class="form-control"/>
                        </div>
                        <div class="col-sm-2 row">
                            @if(($key + 1) == sizeof($experiences))
                            <div class="col-sm-1" style="cursor: pointer;">
                                <icon wire:click="addExperience" class="glyphicon glyphicon-plus-sign fa-2x text-primary" />
                            </div>
                            @endif
                            @if($key > 0)
                            <div class="col-sm-1" style="cursor: pointer;">
                                <icon wire:click="removeExperience({{ $key }})" class="glyphicon glyphicon-minus-sign fa-2x text-danger" />
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <span class='text-danger'>{{ $errors->first('experience') }}</span>
                <input type="hidden" name="experience" value="{{ json_encode($experiences) }}" />
            </div>
        </div>
    </div>
    <div class="box-body col-md-12">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Education</label>
            <div class="col-sm-10">
                @foreach($educations as $key => $education)
                    <div class="row mb-5" style="margin-bottom: 5px;">
                        <div class="col-sm-3">
                            <input type="text" wire:model="educations.{{ $key }}.name" class="form-control" placeholder="College/University Name"/>
                        </div>
                        <div class="col-sm-3">
                            <input type="year" rows="2" wire:model="educations.{{ $key }}.passout_year" class="form-control" placeholder="Passout Year"/>
                        </div>
                        <div class="col-sm-3">
                            <input type="number" wire:model="educations.{{ $key }}.percentage" class="form-control" placeholder="Percentage"/>
                        </div>
                        <div class="col-sm-3 row">
                            @if(($key + 1) == sizeof($educations))
                            <div class="col-sm-1" style="cursor: pointer;">
                                <icon wire:click="addEducation" class="glyphicon glyphicon-plus-sign fa-2x text-primary" />
                            </div>
                            @endif
                            @if($key > 0)
                            <div class="col-sm-1" style="cursor: pointer;">
                                <icon wire:click="removeEducation({{ $key }})" class="glyphicon glyphicon-minus-sign fa-2x text-danger" />
                            </div>
                            @endif
                        </div>
                    </div>
                @endforeach
                <span class='text-danger'>{{ $errors->first('education') }}</span>
                <input type="hidden" name="education" value="{{ json_encode($educations) }}" />
            </div>
        </div>
    </div>
</div>
