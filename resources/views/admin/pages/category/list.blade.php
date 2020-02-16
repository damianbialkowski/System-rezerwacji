@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Lista kategorii</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
                <table id="users_list" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa kategorii</th>
                            <th>kategoria główna</th>
                            <th>Data utworzenia</th>
                            <th>Data aktualizacji</th>
                            <th>Działanie</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="addNewUser flex flex-direction-column justify-content-center align-items-center">
                    <a href="{{ url('admin/category/create') }}"><i class="fas fa-plus"></i></a>
                </div>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/datatables.min.js') }}"></script>
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            
            var table = $('#users_list').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/category/list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'parent_id', name: 'parent_id'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Polish.json"
                },
            });
            
        });
    </script>
@endsection