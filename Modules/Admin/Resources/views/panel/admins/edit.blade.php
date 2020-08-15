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
            {!! form_start($form) !!}
            @method('PUT')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        {!! form_row($form->name) !!}
                        {!! form_row($form->last_name) !!}
                        {!! form_row($form->login) !!}
                        {!! form_row($form->email) !!}
                        <hr>
                        <div class="before-password">
                            <a href="#" class="generate_password">@modulelang('admins.genereate_password')</a>
                            <span class="generated_password"></span>
                        </div>
                        {!! form_row($form->password) !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                        {!! form_row($form->role_id) !!}
                    </div>
                </div>
                <div class="form-buttons">
                    {!! form_row($form->update) !!}
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-back">
                        @modulelang('admins.form.back')
                    </a>
                </div>
            </div>
            {!! form_end($form, false) !!}
        </div>
    </div>
@endsection

