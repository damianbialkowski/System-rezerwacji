@include('admin::partials.header')
<body class="">
@include('admin::partials.sidebar')
<section class="side-content">
    @include('admin::partials.navbar')
    <div class="content-page">
        @yield('admin::main')
    </div>
</section>
@include('admin::partials.footer')
@yield('admin::script')
</body>
</html>

