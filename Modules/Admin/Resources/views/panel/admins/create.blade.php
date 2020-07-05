@extends('admin::layouts.admin')
@section('admin::main')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <h2 class="card-label">@modulelang('admins.title')</h2>
                    <p class="text-muted">@modulelang('admins.title_description')</p>
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

            <form action="{{ route('admin.admins.store')  }}" method="POST" class="form">
                @csrf
                <h3 class="form-header text-muted">@modulelang('admins.user_information')</h3>
                <div class="form-group">
                    <label class="form-control-label" for="name">@modulelang('admins.form.name')</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                           placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="email">@modulelang('admins.form.email')</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                           placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="role_id">@modulelang('admins.form.role')</label>
                    <select class="form-control" name="role_id" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn" name="redirect" value="add_new">@modulelang('admins.form.add_new')</button>
                    <button type="submit" class="btn" name="redirect" value="add_stay">@modulelang('admins.form.and_stay')</button>
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-back">@modulelang('admins.form.back')</a>
                </div>
            </form>
        </div>
    </div>

@endsection
