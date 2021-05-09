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
                        {!! form_row($form->url) !!}
                        {!! form_row($form->active) !!}
                        {!! form_row($form->default) !!}
                    </div>
                    <div class="col-md-6 col-xs-12">
                        @php
                            $languages = $item->languages();
                            $selectedLanguages = $item->selectedLanguagesInForm();
                            $defaultLanguage = $item->default_language;
                        @endphp
                        <div class="row">
                            <div class="col-md-4">
                                <span>Available languages</span>
                                <div class="language-list">
                                    @foreach($languages as $language)
                                        <div class="form-group">
                                            <input type="checkbox" name="selected_languages[{{$language->id}}]"
                                                   id="selected_language_{{$language->id}}"
                                                   @if(in_array($language->id, $selectedLanguages)) checked @endif
                                                   value="{{$language->id}}">
                                            <label for="selected_language_{{$language->id}}"
                                                   class="control-label">{{ $language->name }}</label>
                                        </div>
                                    @endforeach
                                    @error('selected_languages')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <span>Default language</span>
                                <div class="language-list">
                                    @foreach($languages as $language)
                                        <div class="form-group">
                                            <input type="radio" name="default_language"
                                                   id="default_language_{{$language->id}}"
                                                   @if($defaultLanguage && $language->id === $defaultLanguage->id) checked
                                                   @endif
                                                   value="{{ $language->id }}">
                                            <label for="default_language_{{$language->id}}"
                                                   class="control-label">{{ $language->name }}</label>
                                        </div>
                                    @endforeach
                                    @error('default_language')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
