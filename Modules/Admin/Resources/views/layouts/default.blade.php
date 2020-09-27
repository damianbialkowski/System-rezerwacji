<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('admin::partials.header')
<body class="@if(auth()->check()) flex flex-direction-row @endif">
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

