@extends('layouts.admin')
@section('admin.main')
    <div class="headerTop flex justify-content-space-between flex-wrap">
        <div>
            <h1 class="contentHeader">Tworzenie kategorii</h1>
            <hr class="headerTop-hr">
        </div>
    </div>

    @include('admin.helpers.notifications')
    <div class="container-fluid">
        <div class="row">
            <form action="{{ route('admin.categories.create') }}" method="POST" class="form category">
                @csrf
                <div class="header flex justify-content-space-between align-items-center flex-wrap">
                    <h2>Podstawowe informacje</h2>
                    <div class="d-flex">
                        <a href="{{ url()->previous() }}" title="Powrót do poprzedniej strony" class="return_back"><i
                                class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nazwa kategorii:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nazwa kategorii"
                                   required>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="active" name="active" checked>
                            <label for="active" class="form-check-label">Aktywna</label>
                        </div>
                        <div class="form-group">
                            <label for="description">Opis:</label>
                            <textarea name="description" class="form-control" id="description"
                                      maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        Wybierz kategorię nadrzędną
                        <div class="form-group">
                            <select size="3" class="form-control" id="parent_id">
                                <option selected>Brak</option>
                                {!! $categories !!}
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="btnForm">
                    <button type="submit" class="addNewUser"><i class="fa fa-plus"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection
