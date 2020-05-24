@extends('admin::layouts.admin')
@section('admin::main')
    <div class="headerTop flex justify-content-space-between flex-wrap">
        <div>
            <h1 class="contentHeader">Edycja użytkownika:</h1>
            <hr class="headerTop-hr">
        </div>
    </div>
    @if ($errors->any())
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
    <form action="{{ route('admin.admins.update', $item->id) }}" method="POST" class="form">
        @csrf
        @method('PATCH')
        <h2>Podstawowe informacje</h2>
        <div class="form-group">
            <label>Imię:</label>
            <div class="form-input">
                <input type="text" name="firstname" value="{{ $item->firstname }}" required>
            </div>
        </div>
        <div class="form-group">
            <label>Nazwa użytkownika:</label>
            <div class="form-input">
                <input type="text" name="username" value="{{ $item->username }}" required>
            </div>
        </div>
        <div class="form-group">
            <label>Adres e-mail:</label>
            <div class="form-input">
                <input type="email" name="email" value="{{ $item->email }}" required>
            </div>
        </div>
        <div class="form-group">
            <label>Hasło:</label>
            <div class="form-input">
                <span>Niedostępne</span>
            </div>
        </div>
        <div class="form-group">
            <label>Grupa:</label>
            <div class="form-input">
                <select name="role_id" required>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                                @if($role->id === $item->role_id) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label>Utworzone przez:</label>
            <div class="form-input">
{{--                <span>{{ ($item->creator()) ? $item->creator()->username : 'Konto utworzone przez formularz rejestracyjny' }}</span>--}}
            </div>
        </div>
        <div class="form-group">
            <label>Data utworzenia:</label>
            <div class="form-input">
                <span>{{ $item->created_at }}</span>
            </div>
        </div>
        <div class="form-group">
            <label>Data aktualizacji:</label>
            <div class="form-input">
                <span>{{ $item->updated_at }}</span>
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
