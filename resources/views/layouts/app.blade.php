@include('partials.header')
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
    @include('partials.nav')
    @yield('main')
    @include('partials.newsletter')
    @include('partials.errors')
    @include('partials.footer')
    @include('cookieConsent::index')
    @yield('script')
</body>

