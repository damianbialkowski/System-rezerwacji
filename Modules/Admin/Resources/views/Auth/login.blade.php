@extends('admin::layouts.auth')
@section('admin::main')
    <div class="login-box">
        <div class="login-header">
            <h5 class="text-center">Sign In</h5>
        </div>
        <form action="{{ route('admin.login') }}" method="POST" class="login-form">
            @csrf
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                </div>
                <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="login-other-options">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember-me">
                    <label class="form-check-label" for="remember-me">Remember me</label>
                </div>
                <a href="#">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-block">Log In</button>
        </form>
    </div>
    <div class="mt-5 text-center">
        <p>Copyright &copy; 2020r. - DCms</p>
    </div>
@endsection
