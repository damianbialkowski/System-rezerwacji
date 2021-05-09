@extends('admin::layouts.default')
@section('admin::main')
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <h2 class="card-label">Category list</h2>
                    {{--                    <p class="text-muted">Domain list</p>--}}
                </div>
                <div class="card-buttons">
                    <a href="{{ admin_route('blog.categories.create') }}" class="btn">Add new</a>
                </div>
            </div>
        </div>
        <div class="card-body no-p-lr">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            @include('admin::panel.partials.filter-list')
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card card-model-data">
                            <div class="card-header">
                                @include('admin::panel.partials.model-search')
                            </div>
                            <div class="card-body">
                                @include('blog::panel.partials.entity-items')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('admin::script')

@endsection
