@extends('admin::layouts.default')
@section('admin::main')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <h2 class="card-label">Admin list</h2>
                    <p class="text-muted">Administration list</p>
                </div>
                <div class="card-buttons">
                    <a href="{{ admin_route('admins.create') }}" class="create_new">Add new</a>
                </div>
            </div>
        </div>
        @dv()
        <div class="card-body no-p-lr">
{{--            {{ $dataTable->table() }}--}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="item-filter items-all">
                                Wszystkie <span class="badge badge-pill badge-secondary float-right">5</span>
                            </div>
                            <div class="item-filter items-active">
                                Aktywne <span class="badge badge-pill badge-success float-right">5</span>
                            </div>
                            <div class="item-filter items-inactive">
                                Nieaktywne <span class="badge badge-pill badge-danger float-right">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-table-data">
                            <div class="card-header">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" v-model="searchPhrase">
                                    <div class="input-group-append">
                                        <button class="btn" type="button">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                tt
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admin::script')
{{--    {{ $dataTable->scripts() }}--}}
@endsection
