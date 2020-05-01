@extends('layouts.admin')
@section('admin.main')
<div class="headerTop flex justify-content-space-between flex-wrap">
                <div>
                    <h1 class="contentHeader">Lista użytkowników</h1>
                    <hr class="headerTop-hr">
                </div>
            </div>
                <!-- <div class="searchUser flex align-items-center">
                    <input type="text" class="searchDataInput" placeholder="search users">
                    <i class="fas fa-search findUserByName"></i>
                </div> -->


                <!--<table class="usersListTable">
                    <tr>
                        <th class="rowNumberTable rowIdTable">#</th>
                        <th>Fullname</th>
                        <th>Rank</th>
                        <th class="rowDateTable">Created at</th>
                        <th>Operations</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="fullname">Name Surname</td>
                        <td class="users">User</td>
                        <td>11.04.2019r.</td>
                        <td class="flex flex-direction-row align-items-center justify-content-center flex-wrap">
                            <span class="addComment"><a href="" title="Show users info"><i class="far fa-eye"></i></a></span>
                            <span class="closeTicket"><a href="" title="Delete account"><i class="fas fa-users-minus"></i></a></span>
                        </td>
                    </tr>
                </table>-->
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
                    <a href="{{ route('admin.users.create') }}"><i class="fas fa-plus"></i></a>
                </div>
@endsection
@section('admin.script')
    <script src="{{ asset('js/admin/datatables.min.js') }}"></script>
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/topPanel.js') }}"></script>
    <script src="{{ asset('js/admin/rightPanel.js') }}"></script>
    <script src="{{ asset('js/admin/users.js') }}"></script>

    <script type="text/javascript">
  $(function () {

    var table = $('#users_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.users.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'username', name: 'username'},
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
