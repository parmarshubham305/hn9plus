<div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="register_form">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-md-7">
                                <div class="bg-white p-lg-5 p-md-4 p-3 rounded-3 ">
                                    <h1 class="text-primary mb-0">Welcome User</h1>
                                    <p class="mb-lg-5 mb-md-4 mb-3 text-secondary">Register for new account</p>
                                    <form wire:submit.prevent>
                                        <div class="mb-md-4 mb-3">
                                            <input type="text" wire:model="firstName" class="form-control" placeholder="First Name" required>
                                                @error('firstName') 
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="mb-md-4 mb-3">
                                            <input type="text" wire:model="lastName" class="form-control" placeholder="Last Name">
                                                @error('lastName') 
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="mb-md-4 mb-3">
                                            <input type="email" wire:model="email" class="form-control" placeholder="Email" required>
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
                                        <div class="mb-3 mb-md-4 mb-lg-5">
                                            <input type="password" wire:model="password_confirmation"  class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="mb-md-4 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                <label class="form-check-label" for="flexCheckChecked">
                                                    I’m Agreed with <a href=""><u>Terms and Condition</u></a>
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <a wire:click="submit" class="btn btn-secondary px-5 py-2">Register</a>
                                        </div>
                                    </form>
                                    <div class="pt-md-4 pt-3">
                                    <p class="mb-0">Have already an account? <a onclick="Livewire.emit('openModal', 'front.login')" role="button"  class="py-2"><b><u>Log Here</u></b></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <img class="img-fluid" src="{{ asset('frontend/images/register_img.png') }}" alt="register_img" width="529" height="545">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>