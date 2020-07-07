@extends('admin::layouts.admin')
@section('admin::main')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <h2 class="card-label">@modulelang('admins.edit_title') <u>{{ $item->name }}</u></h2>
                    <p> ID: {{ $item->id }}@if($item->created_at), {{ $item->created_at }} @endif</p>
                </div>
                <div class="card-buttons">

                </div>
            </div>
        </div>
        <div class="card-body">
            @if($errors->any())
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
                <input type="hidden" name="user_id" value="{{ $item->id }}">
                <h3 class="form-header text-muted">@modulelang('admins.user_information')</h3>
                <div class="form-group">
                    <label class="form-control-label" for="name">@modulelang('admins.form.name')</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}"
                           placeholder="{{ module_trans('admins.form.name') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="email">@modulelang('admins.form.email')</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $item->email }}"
                           placeholder="{{ module_trans('admins.form.email') }}" required>
                </div>
                <div class="form-group">
                    <label>@modulelang('admins.form.role')</label>
                    <div class="form-input">
                        <select name="role_id" required>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}"
                                        @if($role->id === $item->role_id) selected @endif>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="btn" name="redirect" value="update">
                        @modulelang('admins.form.update')
                    </button>
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-back">
                        @modulelang('admins.form.back')
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

