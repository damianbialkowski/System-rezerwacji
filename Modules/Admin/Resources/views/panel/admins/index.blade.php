@extends('admin::layouts.admin')
@section('admin::main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Lista użytkowników</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
                <table id="users_list" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>E-mail</th>
                            <th>Grupa</th>
                            <th>Data utworzenia</th>
                            <th>Działanie</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="addNewUser flex flex-direction-column justify-content-center align-items-center">
                    <a href="{{ route('admins.create') }}"><i class="fas fa-plus"></i></a>
                </div>
@endsection
@section('admin::script')
    <script src="{{ asset('modules/admin/js/datatables.min.js') }}"></script>
    <script src="{{ asset('modules/admin/js/sidebar.js') }}"></script>
    <script src="{{ asset('modules/admin/js/topPanel.js') }}"></script>
    <script src="{{ asset('modules/admin/js/rightPanel.js') }}"></script>
    <script src="{{ asset('modules/admin/js/users.js') }}"></script>

    <script type="text/javascript">
  $(function () {

    var table = $('#users_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admins.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role_id', name: 'role_id'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Polish.json"
        },
    });

  });
</script>
@endsection
