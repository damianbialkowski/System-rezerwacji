@extends('admin::layouts.default')
@section('admin::main')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <a href="{{ build_crud_route('index') }}" class="return-back">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </a>
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
                        {!! form_row($form->slug) !!}
                        {!! form_row($form->introduction) !!}
                        {!! form_row($form->content) !!}
                        {!! form_row($form->active) !!}
                    </div>
                    <div class="col-md-6 col-xs-12">

                        <div class="row">

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
