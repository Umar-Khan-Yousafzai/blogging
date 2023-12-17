@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Manage Users</h2>
                    <div class="card">
                        <div class="card-body">
                            @include('admin.includes.messages')
                            <table id="usersTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Profile Picture</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <img @if ($user->role=='admin' || ($user->role == 'author' && $user->social_login == null) ) src={{ $user->picture==null?  asset('assets/admin/dist/img/avatar2.png'): asset('images/' . $user->picture)  }}
                                                @else
                                                src={{ $user->picture }} @endif
                                                 alt="Profile Picture"
                                                    class="w-28 rounded-circle" width="80" height="80" style=" max-height: 80px;">
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->gender }}</td>
                                            <td class="inline-flex flex-wrap">
                                                <div class="icon-container">
                                                    <a href="{{ route('users.edit', $user->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="post" class="flex flex-wrap"
                                                        action="{{ route('users.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input hidden type="text" name="user" class="form-control">
                                                        <a href="#"
                                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                                            <i class="fas fa-trash" style="color:red;"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('admin-scripts')
    <!-- DataTables -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- AdminLTE App -->

    <script>
        $(function() {
            $("#usersTable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
