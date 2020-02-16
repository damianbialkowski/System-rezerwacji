@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Podgląd artykułu</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
                <form class="form article">
                    <div class="header flex justify-content-space-between align-items-center flex-wrap">
                        <h2>Podstawowe informacje</h2>
                        <div class="d-flex">
                            <a href="{{ url()->previous() }}" title="Powrót do poprzedniej strony" class="return_back"><i class="fa fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tytuł artykułu:</label>
                        <div class="form-input">
                            <input type="text" name="title" value="{{ $article->title }}" required disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategoria:</label>
                        <div class="form-input">
                            <select name="category" required disabled>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id === $article->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>Wstęp:</label>
                        <div class="form-input">
                            <textarea name="introduction" disabled>{{ $article->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Widoczny:</label>
                        <div class="form-input">
                            <input type="checkbox" name="active" {{ ($article->visible) ? 'checked' : '' }} disabled> - tak/nie
                        </div>
                    </div>
                    <div class="form-group flex flex-direction-column ckeditor-group">
                        <label>Treść:</label>
                        <div class="form-input">
                            <textarea name="article_content" disabled>{{ $article->content }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Utworzone przez:</label>
                        <div class="form-input">
                            <span>{{ $article->author()->getUsername() }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Data utworzenia:</label>
                        <div class="form-input">
                            <span>{{ $article->created_at }}</span>
                        </div>
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
        CKEDITOR.replace('article_content');
    </script>
@endsection