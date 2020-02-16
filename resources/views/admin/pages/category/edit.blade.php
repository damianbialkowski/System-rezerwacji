@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Edycja kategorii</h1>
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
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{!! \Session::get('success') !!}</p>
                </div>
            @endif
                <form action="{{ url('admin/category/edit/'.$category->id) }}" method="POST" class="form category">
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
                            <input type="text" name="name" value="{{ $category->name }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Treść kategorii:</label>
                        <div class="form-input">
                            <textarea name="content" maxlength="255">{{ $category->content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Czy ma być podkategorią?</label>
                        <div class="form-input">
                            <input type="checkbox" name="is_subcategory" id="will_be_subcategory" @if($category->is_subcategory) checked @endif>
                            <select name="subcategory" disabled>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" @if($category->parent_id && $subcategory->id === $category->parent_id) selected @endif>{{ $subcategory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Widoczna:</label>
                        <div class="form-input">
                            <input type="checkbox" name="visible" @if($category->visible) checked @endif>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Utworzone przez:</label>
                        <div class="form-input">
                            <span>{{ $category->author()->getUsername() }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Data utworzenia:</label>
                        <div class="form-input">
                            <span>{{ $category->created_at }}</span>
                        </div>
                    </div>
                    <div class="btnForm">
                        <button type="submit" class="addNewUser"><i class="fa fa-edit"></i></button>
                    </div>                  
                </form>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection