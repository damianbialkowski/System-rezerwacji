@extends('admin::layouts.admin')
@section('admin::main')
    <div class="headerTop flex justify-content-space-between flex-wrap">
        <div>
            <h1 class="contentHeader">Rejestracja użytkownika</h1>
            <hr class="headerTop-hr">
        </div>
    </div>
    @if($errors->any())
{{--        {{dd($errors->all())}}--}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{!! \Session::get('success') !!}</p>
        </div>
    @endif
    <form action="{{ route('admin.admins.store')  }}" method="POST" class="form">
        @csrf
        <h2>Podstawowe informacje</h2>
        <div class="form-group">
            <label for="name">Imię:</label>
            <div class="form-input">
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
        </div>
        {{--                    <div class="form-group">--}}
        {{--                        <label>Nazwa użytkownika:</label>--}}
        {{--                        <div class="form-input">--}}
        {{--                            <input type="text" name="username" value="{{ old('username') }}" required>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        <div class="form-group">
            <label>Hasło:</label>
            <div class="form-input">
                <input type="password" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <label>Adres e-mail:</label>
            <div class="form-input">
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="role_id">Grupa:</label>
            <div class="form-input">
                <select name="role_id" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="btnForm">
            <button type="submit" class="addNewUser"><i class="fa fa-plus"></i></button>
        </div>
    </form>
@endsection
@section('admin::script')
    <script src="{{ asset('modules/admin/js/sidebar.js') }}"></script>
    <script src="{{ asset('modules/admin/js/topPanel.js') }}"></script>
    <script src="{{ asset('modules/admin/js/rightPanel.js') }}"></script>
    <script src="{{ asset('modules/admin/js/users.js') }}"></script>
@endsection
