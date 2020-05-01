@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Nowa kategoria</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{ route('admin.category.create') }}" method="POST"  class="form category">
                    @csrf
                    <div class="header flex justify-content-space-between align-items-center flex-wrap">
                        <h2>Podstawowe informacje</h2>
                        <div class="d-flex">
                            <a href="{{ url()->previous() }}" title="Powrót do poprzedniej strony" class="return_back"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nazwa kategorii:</label>
                        <div class="form-input">
                            <input type="text" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Treść kategorii:</label>
                        <div class="form-input">
                            <textarea name="content" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Czy ma być podkategorią?</label>
                        <div class="form-input">
                            <input type="checkbox" name="is_subcategory" id="will_be_subcategory">
                            <select name="subcategory" disabled>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($loop->first) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Widoczna:</label>
                        <div class="form-input">
                            <input type="checkbox" name="visible" checked>
                        </div>
                    </div>
                    <hr>
                    <div class="btnForm">
                        <button type="submit" class="addNewUser"><i class="fa fa-plus"></i></button>
                    </div>                  
                </form>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection