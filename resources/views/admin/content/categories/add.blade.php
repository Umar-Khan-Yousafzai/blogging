@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Add Categories</h2>
                    <form action="{{ route('categories.store') }}" method="post" id="add-blogs-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="category_name" class="form-control" required
                                placeholder="Add Category Name">
                            @error('category_name')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Category Key</label>
                            <input name="category_key" class="form-control"  required
                                placeholder="Add Category Key i.e example-category">
                            @error('category_key')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="text-center form-group">
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
