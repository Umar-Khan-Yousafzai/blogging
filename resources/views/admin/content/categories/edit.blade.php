@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Edit Category</h2>
                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post" id="edit-category-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use method('PUT') for updating -->
                        <input type="id" name="id" value="{{$category->id}}" hidden>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="category_name" class="form-control" required
                                placeholder="Category Name" value="{{ old('category_name', $category->category) }}">
                            @error('category_name')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Category Key</label>
                            <input type="text" name="category_key" class="form-control" required
                                placeholder="Category Key" value="{{ old('category_key', $category->key) }}">
                            @error('category_key')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="text-center form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
