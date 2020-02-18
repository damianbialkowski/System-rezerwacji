@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
        <div>
                    <h1 class="contentHeader">Ustawienia strony</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
            <div class="blockSettings" data-id="website">
                <form action="{{ route('admin.settings.editWebsite') }}" method="POST" class="form category">
                @csrf
                @method('PATCH')
                    <div class="header flex justify-content-space-between align-items-center flex-wrap">
                        <h2>Podstawowe informacje</h2>
                        <div class="d-flex">
                            <a href="{{ url()->previous() }}" title="Powrót do poprzedniej strony" class="return_back"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tytuł strony:</label>
                        <div class="form-input">
                            <input type="text" name="settings[site_title]" required @if(isset($settings['site_title'])) value="{{ $settings['site_title'] }}" @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Opis strony:</label>
                        <div class="form-input">
                            <textarea name="settings[site_description]" maxlength="255">@if(isset($settings['site_description'])){{ $settings['site_description'] }}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Klucze strony:</label>
                        <div class="form-input">
                            <textarea name="settings[site_keys]">@if(isset($settings['site_keys'])){{ $settings['site_keys'] }}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Logo:</label>
                        <div class="form-input">
                            <input type="file" accept="image/*" name="settings[images][logo]">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label>Favicon:</label>
                        <div class="form-input">
                            <input type="file" accept="image/*" name="settings[images][favicon]">
                        </div>
                    </div>  
                    <div class="addNewUser flex flex-direction-column justify-content-center align-items-center">
                            <input type="hidden" name="settings[type]" value="website">
                            <button type="submit" class="addNewUser"><i class="fas fa-save"></i></button>
                        </div>              
                </form>
            </div>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>
    <script src="{{ asset('js/admin/rightPanel.js') }}"></script>
    <script src="{{ asset('js/admin/settings.js') }}"></script>
@endsection