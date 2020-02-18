@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Rejestracja użytkownika</h1>
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
                <form action="{{ route('admin.user.create') }}" method="POST" class="form">
                    @csrf
                    <h2>Podstawowe informacje</h2>
                    <div class="form-group">
                        <label>Imię:</label>
                        <div class="form-input">
                            <input type="text" name="firstname" value="{{ old('firstname') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nazwa użytkownika:</label>
                        <div class="form-input">
                            <input type="text" name="username" value="{{ old('username') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adres e-mail:</label>
                        <div class="form-input">
                            <input type="email" name="email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Grupa:</label>
                        <div class="form-input">
                            <select name="role" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($role->id == 2) selected @endif>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="btnForm">
                        <button type="submit" class="addNewUser"><i class="fa fa-plus"></i></button>
                    </div>                  
                </form>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>
    <script src="{{ asset('js/admin/rightPanel.js') }}"></script>
    <script src="{{ asset('js/admin/users.js') }}"></script>
@endsection