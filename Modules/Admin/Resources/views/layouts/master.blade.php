@include('admin::partials.header')
<body class="flex flex-direction-row">
@include('admin::partials.sidebar')
    @include('admin::partials.navbar')
        @yield('main')
@include('admin::partials.footer')
@yield('admin::script')
</body>
</html>
