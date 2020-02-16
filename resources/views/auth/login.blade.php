@extends('layouts.app')

@section('main')
<div class="content section_login">
    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="header_login">
              <h1>Logowanie</h1>
              <hr class="hr_login">
          </div>
          <form action="{{ route('user.login') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="email">Adres e-mail:</label>
              <input type="email" class="form-control" id="email" name="email" required>
              {!! $errors->first('email', '<p class="error-message">:message</p>') !!}
            </div>
            <div class="form-group">
              <label for="password">Hasło:</label>
              <input type="password" class="form-control" id="password" name="password" required>
              {!! $errors->first('password', '<p class="error-message">:message</p>') !!}
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="rememberMe" name="remember">
              <label class="custom-control-label" for="rememberMe">Zapamiętaj mnie</label>
            </div> 
            <div class="d-flex justify-content-around ">
              <a href="#" class="remember_password">Nie pamiętasz hasła?</a>
              <button type="submit" class="btn btn-custom ml-auto">Zaloguj</button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <h2 class="text-center">Informacje</h2>

        </div>
      </div>
    </section>
  </div>
@endsection
@section('script')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
@endsection

