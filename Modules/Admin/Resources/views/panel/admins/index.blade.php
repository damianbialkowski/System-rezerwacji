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
                    <a href="{{ route('admin.admins.create') }}" class="create_new">Create new</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="admins_list">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Group</th>
                    <th>Created at</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    {{--    <div class="addNewUser flex flex-direction-column justify-content-center align-items-center">--}}
    {{--        <a href="{{ route('admin.admins.create') }}"><i class="fas fa-plus"></i></a>--}}
    {{--    </div>--}}
@endsection
@section('admin::script')
    <script src="{{ asset('modules/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/sidebar.js') }}"></script>

    <script type="text/javascript">
        $(function () {

            var table = $('#admins_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.admins.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'role_id', name: 'role_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });

        });
    </script>
@endsection
