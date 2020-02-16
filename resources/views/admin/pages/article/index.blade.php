@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Lista Artykułów</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
                <table id="users_list" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tytuł artykułu</th>
                            <th>Kategoria</th>
                            <th>Data utworzenia</th>
                            <th>Data aktualizacji</th>
                            <th>Działanie</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="addNewUser flex flex-direction-column justify-content-center align-items-center">
                    <a href="{{ url('admin/article/create') }}"><i class="fas fa-plus"></i></a>
                </div>
                <div class="shadow_bg"></div>
                <div class="alert">
                    <div class="alert-content">
                        <h3>Czy chcesz usunąć ten artykuł?</h3>
                        <div class="alert-btn">
                            <span class="cancel">Anuluj</span>
                            <a href="" class="delete_article">Usuń</a>
                        </div>
                    </div>
                </div>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>
    <script src="{{ asset('js/admin/rightPanel.js') }}"></script>

    <script type="text/javascript">
  $(function () {
    
    var table = $('#users_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/article/index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'category_id', name: 'category_id'},
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