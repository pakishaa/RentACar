@auth()
    @include('layouts.navbars.navs.auth-client')
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
@endguest
