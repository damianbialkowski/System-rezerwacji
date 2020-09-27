<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
@include('admin::partials.header')
<body>
@yield('admin::main')

@include('admin::partials.footer')
@yield('admin::script')
</body>
</html>
