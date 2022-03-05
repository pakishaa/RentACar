@auth()
    @include('layouts.navbars.navs.auth-admin')
@endauth

@guest()
    @include('layouts.navbars.navs.guest')
@endguest
