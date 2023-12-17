@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>See All People Who've Contacted</h2>
                    <div class="card">
                        <div class="card-body">
                            @include('admin.includes.messages')
                            <table id="blogsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        {{-- <th>Action </th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->message }}</td>
                                            {{-- <td> --}}
                                                {{-- <form action="" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id">
                                                    <input type="hidden" name="status"> --}}
                                                    {{-- <button class="btn btn-info btn-sm" type="submit"> --}}
                                                        {{-- @if ($blog->status)
                                                            Send to Draft
                                                        @else
                                                            Publish
                                                        @endif --}}
                                                    {{-- </button> --}}
                                                {{-- </form> --}}
                                            {{-- </td> --}}
                                            {{-- <td> --}}
                                                {{-- <a href="#" target="_blank"> --}}
                                                    {{-- <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#">
                                                    <i class="fas fa-trash" style="color:red"></i> --}}
                                                {{-- </a> --}}
                                            {{-- </td> --}}
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
            $("#blogsTable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
