<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('blog::partials.header')
<body class="@if(auth()->guard('admin')->check()) flex flex-direction-row @endif">
@include('blog::partials.sidebar')
<section class="side-content">
    @include('blog::partials.navbar')
    <div class="content-page">
        @yield('blog::main')
    </div>
</section>
@include('admin::partials.footer')
@yield('blog::script')
</body>
</html>

