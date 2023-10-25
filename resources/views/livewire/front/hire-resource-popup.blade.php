<div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header bg-light px-4">
            <h2 class="fw-bold text-secondary mb-0">Our Resource</h2>
            <button type="button" class="btn-close text-danger" wire:click="$emit('closeModal')" aria-label="Close"></button>
        </div>
        <div class="modal-body p-md-5 p-4 pe-md-0  position-relative">
            <div class="MultiCarousel" data-interval="1000" data-items="1,2,2,4" data-slide="2" data-items="1" id="resourceSlider">
                <div class="MultiCarousel-inner">
                    @if($resources)
                    @foreach($resources as $key => $resource)
                    <div class="item product-box">
                        <div class="rounded-4 p-4 our-resorce-card bg-light border">
                            <div class="d-flex align-self-center mb-4">
                                <img class="img-fluid" height="80" width="80" src="images/user-grey.png" alt="">
                                <div class="align-self-center ms-4">
                                    <h4 class="mb-0 fw-semibold">{{ $resource['name'] }}</h4>
                                    <p class="mb-0 fw-bold">{{ $resource['designation'] }}</p>
                                </div>
                                <p class="mb-0 ms-auto">5 Years</p>
                            </div>
                            <p class="mb-0"><strong>Skills:</strong>{{ Helper::getDeveloperSkills($resource['id']) }}</p>
                            <div class="d-flex mt-4">
                                <a href="{{ route('front.view.resume', $resource['id']) }}" target="_blank" class="btn btn-outline-primary px-4">View Resume</button>
                                <!-- <button type="button" class="btn btn-primary px-4 ms-2" wire:click="addResource('1')">Add Service</button> -->
                                <a class="btn btn-primary px-4 ms-2" wire:click="addResource({{ $key }})">Add Service</a>
                            </div>
                            <div class="row" id="addService">
                            <div class="col-md-6">
                                <div class="me-3">
                                    <h6 class="fw-semibold">Hours / Day</h6>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn bg-secondary btn-sm rounded-0 h-100" wire:click="minusHours({{ $key }})" id="minus-btn"><i class="fa fa-minus text-white"></i></button>
                                    </div>
                                    <input type="number" class="form-control bg-white text-center form-control-sm border-bottom-0" wire:model="resources.{{ $key }}.hours">
                                    <div class="input-group-prepend">
                                        <button class="btn bg-secondary btn-sm rounded-0 h-100" wire:click="plusHours({{ $key }})" id="plus-btn"><i class="fa fa-plus text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="me-3">
                                    <h6 class="fw-semibold">Month</h6>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn bg-secondary btn-sm rounded-0 h-100" wire:click="minusHMonth({{ $key }})" id="minus-btn"><i class="fa fa-minus text-white"></i></button>
                                    </div>
                                    <input type="number" class="form-control bg-white text-center form-control-sm border-bottom-0" wire:model="resources.{{ $key }}.months">
                                    <div class="input-group-prepend">
                                        <button class="btn bg-secondary btn-sm rounded-0 h-100" wire:click="plusMonth({{ $key }})" id="plus-btn"><i class="fa fa-plus text-white"></i></button>
                                    </div>
                                </div>
                            </div>
                            </div>
                            @if(in_array($key, $selectedResources))
                            <div class="check">
                                <i class="fa-solid fa-circle-check text-success"></i>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <button class="carousel-control-prev leftLst over"><span class="carousel-control-prev-icon"></span></button><button class="carousel-control-next rightLst"><span class="carousel-control-next-icon"></span></button>
            </div>


            <div class="pt-3 text-center">
                <a wire:click="submit" class="btn btn-success btn-lg px-md-4">Submit Resources </a>
            </div>
        </div>
    </div>
</div>