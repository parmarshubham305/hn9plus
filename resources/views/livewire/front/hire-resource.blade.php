<section class="resource-section spacing-y">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <button class="btn btn-secondary px-3 mb-3 float-end d-md-none d-block" type="button" id="asdasd" data-bs-toggle="offcanvas" data-bs-target="#resourceoffcanvas" aria-controls="resourceoffcanvas">
                    Filter <i class="fa-solid fa-filter ms-2"></i>
                </button>
                <div class="filtercanvas " tabindex="-1" id="resourceoffcanvas" aria-labelledby="resourceoffcanvas">
                    <div class="card rounded-3 filter-card">
                        <div class="card-header border-0 py-3 px-md-5  d-flex align-items-center bg-primary">
                            <h4 class="mb-0 text-white">Filters</h4>
                            <button type="button" class="btn-close text-white d-md-none d-block ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="card-body px-lg-5 px-3 py-3 overflow-auto">
                            <div class="accordion">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($groupfilters as $key => $filter)
                                <div class="accordion-item border-0 ">
                                    <h2 class="accordion-header" id="filter_{{ $i }}">
                                        <button class="accordion-button filter-accordion px-0 bg-white text-dark py-3" type="button" data-bs-toggle="collapse" data-bs-target="#filter_{{ strtolower($key) }}" aria-expanded="true" aria-controls="filter_{{ strtolower($key) }}"> {{ $key }} </button>
                                    </h2>
                                    <div id="filter_{{ strtolower($key) }}" class="accordion-collapse collapse show" aria-labelledby="filter_{{ $i }}">
                                        <div class="accordion-body p-0 pb-3">
                                            @foreach($filter as $value)
                                            <div class="form-check mb-2 position-relative">
                                                <input class="form-check-input" wire:model="selectedFilters.{{ $value['id'] }}" wire:change="filter" type="checkbox" id="{{ $value['id'] }}_{{ $value['title'] }}">
                                                <label class="form-check-label ps-2" for="{{ $value['id'] }}_{{ $value['title'] }}"> {{ $value['title'] }} </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="resource-select-box bg-white p-3 border rounded-4 mb-3 d-md-flex flex-wrap justify-content-between">
                            <h5 class="fw-bold mb-0">Johan Doe  <span class="fs-6 fw-normal">Web Designer</span></h5>
                            <p class="d-inline-block text-dark mb-0">Day/Hours  <strong> 4</strong></p>
                            <a href="#" class="btn text-danger float-end"> <i class="d-inline-block fa-regular fa-trash-can" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="resource-select-box bg-white p-3 border rounded-4 mb-3 d-md-flex flex-wrap justify-content-between">
                            <h5 class="fw-bold mb-0">Raj parmar  <span class="fs-6 fw-normal">Frontend Developer</span></h5>
                            <p class="d-inline-block text-dark mb-0">Day/Hours  <strong> 2</strong></p>
                            <a href="#" class="btn text-danger float-end"> <i class="d-inline-block fa-regular fa-trash-can" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="resource-select-box bg-white p-3 border rounded-4 mb-3 d-md-flex flex-wrap justify-content-between">
                            <h5 class="fw-bold mb-0">Nike <span class="fs-6 fw-normal">Frontend Developer</span></h5>
                            <p class="d-inline-block text-dark mb-0">Day/Hours  <strong> 2</strong></p>
                            <a href="#" class="btn text-danger float-end"> <i class="d-inline-block fa-regular fa-trash-can" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-auto ms-auto text-lg-end text-center mb-4 ">
                        <a href="#" class="btn btn-primary rounded-3 px-5">Submit </a>
                    </div>
                </div>
                
                <div class="row hire-resource">
                    @foreach($filters as $key => $filter)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card rounded-4 hire-box h-100">
                            <div class="card-header p-0 position-relative bg-transparent  border-0 border-0">
                                <picture>
                                    <img src="{{ asset('frontend/images/resource/shapeborder.png') }}" class="img-fluid shap-border w-100" alt="shape">
                                    <img src="{{ asset('frontend/images/resource/shapbg.png') }}" class="img-fluid position-relative w-100" alt="shape">
                                </picture>
                                <div class="shape">
                                    <img src="{{ asset($filter['logo']) }}" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="card-body text-center pt-4 pb-0 px-md-4">
                                <h3 class="text-secondary mb-0">{{ $filter['title'] }}</h3>
                                <p class="text-secondary fw-semibold">$ {{ $filter['price'] }}/hr</p>
                                <p class="">{{ $filter['description'] }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 m-auto pt-3 pb-4">
                                <button type="button" class="btn btn-primary" onclick="Livewire.emit('openModal', 'front.hire-resource-popup', { id: {{ $filter['id'] }} })">Hire Resource</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $filters->links() }}
                </div>
            </div>
        </div>
    </div>
</section>