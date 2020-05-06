@include('admin::partials.header')
<body class="flex flex-direction-row">
@include('admin::partials.sidebar')
<section class="sideContent">
    @include('admin::partials.navbar')
    <div class="content mTop30">
        @yield('main')
    </div>
</section>
@include('admin::partials.footer')
@yield('admin::script')
</body>
</html>
