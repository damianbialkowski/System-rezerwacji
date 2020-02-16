@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Nowy artykuł</h1>
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
                <form action="{{ url('/admin/article/create') }}" method="POST" enctype="multipart/form-data" class="form article">
                    @csrf
                    <div class="header flex justify-content-space-between align-items-center flex-wrap">
                        <h2>Podstawowe informacje</h2>
                        <div class="d-flex">
                                <a href="{{ url()->previous() }}" title="Powrót do poprzedniej strony" class="return_back"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tytuł artykułu:</label>
                        <div class="form-input">
                            <input type="text" name="title" value="{{ old('title') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategoria:</label>
                        <div class="form-input">
                            <select name="category" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($loop->first) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>Grafika główna:</label>
                        <div class="form-input">
                            <input type="file" name="image_article">
                        </div>
                    </div>  
                    <div class="form-group">
                        <label>Widoczny:</label>
                        <div class="form-input">
                            <input type="checkbox" name="visible" checked> - tak/nie
                        </div>
                    </div>
                    <div class="form-group flex flex-direction-column ckeditor-group">
                        <label>Treść:</label>
                        <div class="form-input">
                            <textarea name="content">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Po utworzeniu, przejdź do artykułu:</label>
                        <div class="form-input">
                            <input type="checkbox" name="redirect_article"> - tak/nie
                        </div>
                    </div>
                    <div class="btnForm">
                        <button type="submit" class="addNewUser"><i class="fa fa-plus"></i></button>
                    </div>                 
                </form>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>
    <script src="{{ asset('js/admin/rightPanel.js') }}"></script>
    <script src="{{ asset('js/admin/users.js') }}"></script>
    <script src="{{ asset('js/admin/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection