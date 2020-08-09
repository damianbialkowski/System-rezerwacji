@extends('admin::layouts.admin')
@section('admin::main')

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title card-columns">
                <div class="card-description">
                    <h2 class="card-label">Admin list</h2>
                    <p class="text-muted">Administration list</p>
                </div>
                <div class="card-buttons">
                    <a href="{{ route('admin.admins.create') }}" class="create_new">Add new</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table() }}
        </div>
    </div>
    {{--    <div class="addNewUser flex flex-direction-column justify-content-center align-items-center">--}}
    {{--        <a href="{{ route('admin.admins.create') }}"><i class="fas fa-plus"></i></a>--}}
    {{--    </div>--}}
@endsection
@section('admin::script')
    {{ $dataTable->scripts() }}
@endsection
