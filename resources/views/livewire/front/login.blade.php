<div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="login shadow bg-primary rounded-3 overflow-hidden">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <h2 class="text-white pb-lg-0 pb-0 p-lg-5 p-3">Welcome to HN9+</h2>
                    <div id="carouselExampleIndicators" class="carousel slide p-lg-5 p-3 pt-lg-0 pt-0"
                        data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="0" class="active" aria-current="true"
                                aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                
                                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint aliquid
                                    placeat dolorum? Obcaecati autem, deserunt nostrum assumenda maiores
                                    rerum aut! Earum tempora nobis vero dicta quaerat deserunt eveniet sint
                                    repellendus.</p>
                            </div>
                            <div class="carousel-item">
                                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                                    explicabo sequi magnam minus quae officiis excepturi et rerum. Deleniti
                                    impedit aliquid est, vel quam officiis harum itaque similique voluptas
                                    eligendi!</p>
                            </div>
                            <div class="carousel-item">
                                <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                                    explicabo sequi magnam minus quae officiis excepturi et rerum. Deleniti
                                    impedit aliquid est, vel quam officiis harum itaque similique voluptas
                                    eligendi!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-lg-5 p-3 bg-white overflow-hidden h-100">
                        <h1 class="mb-lg-5 mb-md-4 mb-3">Login</h1>
                        <form wire:submit.prevent class="text-center m-auto p-4">
                            <div class="mb-md-4 mb-3">
                                <input type="email" wire:model="email" class="form-control" placeholder="Email ID" required>
                                @error('email') 
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-md-4 mb-3">
                                <input type="password" wire:model="password" class="form-control" placeholder="Password" required>
                                @error('password')
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center mb-md-4 mb-3">
                                <button wire:click="submit" class="btn btn-secondary px-4">Log In</button>
                            </div>
                        </form>
                        <div class="text-center right_section">
                            <p class="mb-3">Don't have account? - <a href="javascript:void()" onclick="Livewire.emit('openModal', 'front.register')"><b><u> Register Now</u></b></a></p>
                            <p class="mb-3">or</p>
                            <a href="{{ url('authorized/google') }}"><img class="img-fluid" src="{{ asset('frontend/images/Googel_icon.png') }}" alt="google_icon"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>