<html lang="en">
@include('frontend.layouts.head')
@yield('css')
<body>
    @if(Request::route()->getName() != 'login' && Request::route()->getName() != 'register' && Request::route()->getName() != 'password.request' && Request::route()->getName() != 'password.reset')
        @include('frontend.layouts.header')
    @endif
    <main>
        @yield('content')
    </main>
    @if(Request::route()->getName() != 'login' && Request::route()->getName() != 'register' && Request::route()->getName() != 'password.request' && Request::route()->getName() != 'password.reset')
        @include('frontend.layouts.footer')
    @endif
    {{ Html::script("frontend/js/bootstrap.bundle.js") }}
    {{ Html::script("frontend/thirdparty/js/jquery.min.js") }}
    {{ Html::script("frontend/thirdparty/js/all.min.js") }}
    {{ Html::script("frontend/thirdparty/js/slick.min.js") }}
    {{ Html::script("frontend/js/theme.js") }}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewire('livewire-ui-modal')
    @yield('js')
    @livewireScripts
</body>
</html>