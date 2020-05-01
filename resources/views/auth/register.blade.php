@extends('layouts.app')

@section('main')
    <section class="container main section_login">
      <div class="row">
        <div class="col-md-6">
          <div class="header_login">
              <h1>Rejestracja</h1>
              <hr class="hr_login">
          </div>
          <form action="{{ route('users.register') }}" method="POST">
          @csrf
          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
            {!! $errors->first('username', '<p class="error-message">:message</p>') !!}
          </div>
          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="email">Adres e-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            {!! $errors->first('email', '<p class="error-message">:message</p>') !!}
          </div>
          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="password">Hasło:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            {!! $errors->first('password', '<p class="error-message">:message</p>') !!}
          </div>
          <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            <label for="password">Powtórz hasło:</label>
            <input type="password" class="form-control" id="password_repeat" name="password_confirmation" required>
            {!! $errors->first('password_repeat', '<p class="error-message">:message</p>') !!}
          </div>
          <div class="d-flex justify-content-around">
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox" class="custom-control-input" id="accepted_rules" name="accepted_rules" required>
              <label class="custom-control-label" for="accepted_rules">Zapoznałem/am się z regulaminem</label>
              {!! $errors->first('accepted_rules', '<p class="error-message">:message</p>') !!}
            </div>
            <button type="submit" class="btn btn-custom ml-auto">Zarejestruj</button>
          </div>
        </form>
        </div>
        <div class="col-md-6">
          <h2 class="text-center">Informacje</h2>

        </div>
      </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
@endsection
