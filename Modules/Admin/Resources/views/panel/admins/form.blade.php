@extends('admin::layouts.default')
@section('admin::main')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <a href="{{ build_crud_route('index') }}" class="return-back"><i class="fas fa-long-arrow-alt-left"></i></a>
                    <h2 class="card-label">@module_lang("title.type." . get_current_method())</h2>
                    <p class="text-muted">@module_lang("title_description.type." . get_current_method())</p>
                </div>
                <div class="card-buttons">

                </div>
            </div>
        </div>
        <div class="card-body">
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
                        {!! form_row($form->last_name) !!}
                        {!! form_row($form->login) !!}
                        {!! form_row($form->email) !!}

                        <div class="before-password">
                            <a href="#" class="generate_password">@module_lang('generate_password')</a>
                            <span class="generated_password"></span>
                        </div>
                        {!! form_row($form->password) !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                        {!! form_row($form->role_id) !!}
                    </div>
                </div>
                @if(!isset($edit) || $edit == 1)
                    <div class="form-buttons">
                        <button type="submit" class="btn">@lang('admin::main.update')</button>
                    </div>
                @endif
            </div>
            {!! form_end($form, false) !!}
        </div>
    </div>
@endsection
