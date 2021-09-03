<!DOCTYPE html>
<html lang="en">
    @include('home.components.head')

    <body x-data="{openMobileMenu: false, openGuestModal: false}">
        @yield('content')
        @include('home.components.call-to-action')
        @include('home.components.organized')
        @include('home.components.contact')
        @include('home.components.footer')
        @include('home.components.body')
        @yield('script')
    </body>

</html>
