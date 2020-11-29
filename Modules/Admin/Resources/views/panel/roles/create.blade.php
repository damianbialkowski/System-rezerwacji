@extends('admin::layouts.default')
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
            {!! form_start($form) !!}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        {!! form_row($form->name) !!}
                        {!! form_row($form->title) !!}

                    </div>
                    <div class="col-md-6 col-xs-12">
                    </div>
                </div>
                <div class="form-buttons">
                    {!! form_row($form->update) !!}
                    <button type="submit" class="btn" name="redirect" value="add_stay">
                        @modulelang('admins.form.and_stay')
                    </button>
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-back">
                        @modulelang('admins.form.back')
                    </a>
                </div>
            </div>
            {!! form_end($form, false) !!}
        </div>
    </div>

@endsection
