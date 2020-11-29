<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('admin::partials.header')
<body class="login-page d-flex justify-content-center align-items-center flex-column">
@yield('admin::main')

@include('admin::partials.scripts')
@yield('admin::script')
</body>
</html>
