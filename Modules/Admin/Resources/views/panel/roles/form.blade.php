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
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-general-tab" data-toggle="pill" href="#general" role="tab"
                       aria-controls="pills-general" aria-selected="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-abilities-tab" data-toggle="pill" href="#abilities" role="tab"
                       aria-controls="pills-abilities" aria-selected="false">Abilities</a>
                </li>
            </ul>
            <div class="container-fluid">
                {!! form_start($form) !!}
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="general" role="tabpanel"
                         aria-labelledby="pills-general-tab">
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                {!! form_row($form->name) !!}
                                {!! form_row($form->title) !!}
                                {!! form_row($form->active) !!}

                            </div>
                            <div class="col-md-6 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="abilities" role="tabpanel"
                         aria-labelledby="pills-general-tab">
                        <div class="row text-center">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">Index</div>
                            <div class="col-md-2">Create</div>
                            <div class="col-md-2">Show</div>
                            <div class="col-md-2">Update</div>
                            <div class="col-md-2">Delete</div>
                        </div>
                        @foreach($modules as $moduleName => $module)
                            <div class="row">
                                <div class="col-md-12 title">{{ $moduleName }}</div>
                            </div>
                            @foreach($module as $namespace => $data)
                                <div class="row text-center">
                                    <div class="col-md-2 text-left"><span
                                            class="pl-3">{{ ucfirst(str_plural($data['translation'])) }}</span></div>
                                    @foreach($data['crud'] as $option => $status)
                                        <div class="col-md-2">
                                            {{Form::hidden("abilities[" .$data['model'] ."][$option]", 0)}}
                                            {{ Form::checkbox("abilities[" .$data['model'] ."][$option]", 1, $status, ((isset($edit) && $edit == 0) ? ['disabled'] : [])) }}
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endforeach
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
    </div>
@endsection
