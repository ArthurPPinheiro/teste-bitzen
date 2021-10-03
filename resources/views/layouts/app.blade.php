<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>BTZ Transportes</title>

        <link rel="icon" href="{{ asset('img/brand/favicon.png') }}" type="image/png">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

        <!-- Icons -->
        {{-- <link rel="stylesheet" href="{{ asset('vendor/nucleo/css/nucleo.css') }}" type="text/css"> --}}

       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{ mix('adm/css/admin.css') }}">
       <link rel="stylesheet" href="{{ mix('adm/css/soft-ui-dashboard.css') }}">
       {{-- <link rel="stylesheet" href="{{ mix('adm/css/vendor-admin.css') }}"> --}}

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" />

       <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    </head>
    <body class="g-sidenav-show bg-gray-100">
        {{-- If the user is authenticated --}}
        @auth()
            {{-- If the user is authenticated on the static sign up or the sign up page --}}
            @if (in_array(request()->route()->getName(),['static-sign-up', 'sign-up'],))
                @include('layouts.navbars.guest.sign-up')
                @yield('content')
                @include('layouts.footers.guest.with-socials')
                {{-- If the user is authenticated on the static sign in or the login page --}}
            @elseif (in_array(request()->route()->getName(),['sign-in', 'login'],))
                @include('layouts.navbars.guest.login')
                @yield('content')
                @include('layouts.footers.guest.description')
            @elseif (in_array(request()->route()->getName(),['profile', 'my-profile'],))
                @include('layouts.navbars.auth.sidebar')
                <div class="main-content position-relative bg-gray-100">
                    @include('layouts.navbars.auth.nav-profile')
                    <div>
                        @yield('content')
                        @include('layouts.footers.auth.footer')
                    </div>
                </div>
                @include('components.plugins.fixed-plugin')
            @else
                @include('layouts.navbars.auth.sidebar')
                @include('layouts.navbars.auth.nav')
                {{-- @include('components.plugins.fixed-plugin') --}}

                @yield('content')

                <main>
                    <div class="container-fluid">
                        <div class="row">
                            @include('layouts.footers.auth.footer')
                        </div>
                    </div>
                </main>
            @endif
        @endauth

        {{-- If the user is not authenticated (if the user is a guest) --}}
        @guest
            {{-- If the user is on the login page --}}
            @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
                @include('layouts.navbars.guest.login')
                @yield('content')
                <div class="mt-5">
                    @include('layouts.footers.guest.with-socials')
                </div>
                {{-- If the user is on the sign up page --}}
            @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
                <div>
                    @include('layouts.navbars.guest.sign-up')
                    @yield('content')
                    @include('layouts.footers.guest.with-socials')
                </div>
            @endif
        @endguest

        {{-- Laravel Mix - JS File --}}
        <script src="{{ mix('adm/js/admin.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>

        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>

        @stack('scripts-footer')

        <script>
            $( function () {
                $('.dataTable').DataTable({
                    language: {
                        paginate: {
                        next: '&#8594;', // or '→'
                        previous: '&#8592;' // or '←'
                        }
                    }
                });
            });
        </script>

        @if(Session::has('type') && Session::get('type') == 'success')
            <script>
                $( function(){
                    toastr.success('{{ Session::get('message') }}')
                })
            </script>
        @endif
        @if(Session::has('type') && Session::get('type') == 'error')
            <script>
                $( function(){
                    toastr.error('{{ Session::get('message') }}')
                })
            </script>
        @endif
    </body>
</html>
