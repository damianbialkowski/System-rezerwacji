<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('admin::partials.header')
<body>
<div id="admin-panel">
    @include('admin::partials.sidebar')
    <div id="main-content">
        @include('admin::partials.navbar')
        <div class="page-content">
            <div class="container-fluid">
                @yield('admin::main')
            </div>
        </div>
        <footer class="author">
            <p>Copyright 2020 &copy; DCMS by Damian Białkowski</p>
        </footer>
    </div>
</div>
@include('admin::partials.scripts')
</body>
</html>

