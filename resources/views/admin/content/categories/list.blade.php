@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Manage Categories</h2>
                    <div class="card">
                        <div class="card-body">
                            @include('admin.includes.messages')
                            <table id="blogsTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        {{-- <th>Image</th> --}}
                                        <th>Title</th>
                                        <th>Category Key</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->category }}</td>
                                            <td>{{ $category->key }}</td>
                                            <td>
                                                <form action="{{ route('categories.status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                                    <button
                                                        class="btn @if ($category->status == 0) btn-success @else btn-danger @endif btn-sm"
                                                        type="submit">
                                                        @if ($category->status == 0)
                                                            Publish Category
                                                        @else
                                                            Deactivate Category
                                                        @endif
                                                    </button>
                                                </form>
                                            </td>
                                            <td  class="inline-flex flex-wrap">
                                                <div class="icon-container">
                                                    <a href="{{ route('categories.edit', $category->id) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="post" class="flex flex-wrap"
                                                        action="{{ route('categories.destroy', $category->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input hidden type="text" name="category" class="form-control">
                                                        <a href="#"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        <i class=" fas fa-trash" style="color:red;"></i>
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
            $("#blogsTable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
@endsection
