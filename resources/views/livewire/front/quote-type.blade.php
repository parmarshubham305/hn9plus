<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4 me-lg-5 mb-md-0 mb-4">
        <div class="card bg-transparent">
            <div class="card-body p-0 position-relative">
                <img src="{{ asset('frontend/images/shape.png') }}" class="img-fluid" alt="shape">
                <div class="shape">
                    <img src="{{ asset('frontend/images/fixed.svg') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="card-details mb-5 p-md-5 p-4 text-center bg-transparent">
                <h2 class="text-secondary mb-md-4">Fixed Price</h2>
                <p  class="mb-md-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies metus eget feugiat posuere. </p>
                @guest
                <a onclick="Livewire.emit('openModal', 'front.login')" class="btn btn-primary">Explore More  </a>
                @else
                <a href="{{ route('front.fixed-rate.create') }}" class="btn btn-primary">Explore More  </a>
                @endguest
            </div>
            <div class="ocean">
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 ms-lg-5">
        <div class="card bg-transparent">
            <div class="card-body p-0 position-relative">
                <img src="{{ asset('frontend/images/shape.png') }}" class="img-fluid" alt="shape">
                <div class="shape">
                    <img src="{{ asset('frontend/images/hired.svg') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="card-details mb-5 p-md-5 p-4 text-center bg-transparent">
                <h2 class="text-secondary mb-md-4">Hourly Price</h2>
                <p class="mb-md-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies metus eget feugiat posuere. </p>
                @guest
                <a onclick="Livewire.emit('openModal', 'front.login')" class="btn btn-primary">Explore More  </a>
                @else
                <a href="{{ route('front.hourly-rate.create') }}" class="btn btn-primary">Explore More  </a>
                @endguest
            </div>
            <div class="ocean">
                <div class="wave"></div>
                <div class="wave"></div>
            </div>
        </div>
    </div>
</div>