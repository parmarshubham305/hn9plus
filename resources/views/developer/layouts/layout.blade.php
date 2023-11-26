<html lang="en">
@include('developer.layouts.head')
@yield('css')
<body>
<style>
        .bg-light-blue {
            background-color: #BDE6FF;
        }

        .bg-cercle-blue {
            background: #143E57;
        }

        .bg-light-yellow {
            background-color: #FFEFCC;
        }

        .bg-cercle-yellow {
            background: #F0A80B;
        }

        .dashboard_card_header {
            border-radius: 100%;

            /* display: flex; */
            padding: 10px;
            position: relative;
            height: 204px;
            width: 204px;
            /* justify-content: center;
        align-items: center; */
            left: -32px;
            top: -50;
            /* z-index: -1; */
        }

        .dashboard_card_header h4 {
            font-size: 70px;
            color: #fff;
            position: absolute;
            bottom: -6%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .dashboard-active,
        .dashboard-active svg {
            color: #fff;
            fill: #fff;
        }

        .nav-pills .dashboard-active.active {
            background-color: #fff;
            color: #143E57;
        }

        .nav-pills .dashboard-active.active svg {
            /* color: #143E57; */
            fill: #143E57;
        }

        .dashboard-active:hover {
            background-color: #fff;
            color: #143E57;
        }

        .dashboard-active:hover svg {
            fill: #143E57;
        }


        @media (max-width: 600px) {
            .dashboard_card_header {
                height: 130px;
                width: 130px;
            }

            .dashboard_card_header h4 {
                font-size: 32px;
                bottom: -3%;
                left: 55%;
            }
        }

        .page-item.active .page-link {
            background-color: #F0A80B !important;
        }
    </style>
    <main>
        @if(Request::route()->getName() == 'developer.login' || Request::route()->getName() == 'developer.password.request' || Request::route()->getName() == 'developer.password.reset')
            @yield('content')
        @else
        @include('developer.layouts.sidebar')    
        <div class="right-side">
            @include('developer.layouts.header')
            <div class="right-contnet p-0">
                @yield('content')
            </div>
        <div>
        @endif

        
    </main>
    {{ Html::script("frontend/js/bootstrap.bundle.js") }}
    {{ Html::script("frontend/thirdparty/js/jquery.min.js") }}
    {{ Html::script("frontend/thirdparty/js/all.min.js") }}
    {{ Html::script("frontend/thirdparty/js/slick.min.js") }}
    {{ Html::script("frontend/js/theme.js") }}
    @livewire('livewire-ui-modal')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @yield('js')
    @livewireScripts
</body>
</html>