@extends('admin::layouts.admin')
@section('admin::main')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <h2 class="card-label">@lang('admin::admin.register_user')</h2>
                    <p class="text-muted">Register new user</p>
                </div>
                <div class="card-buttons">

                </div>
            </div>
        </div>
        <div class="card-body">
            @modulelang('admin.register_user')
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

            <form action="{{ route('admin.admins.store')  }}" method="POST" class="form">
                @csrf
                <h3 class="form-header text-muted">User information</h3>
                <div class="form-group">
                    <label class="form-control-label" for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                           placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                           placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="email">Name</label>
                    <select class="form-control" name="role_id" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn" name="redirect" value="add_new">Add new</button>
                    <button type="submit" class="btn" name="redirect" value="add_stay">And stay</button>
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-back">Back</a>
                </div>
            </form>
        </div>
    </div>

@endsection
