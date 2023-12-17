@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Add Blogs</h2>
                    <form action="{{ route('blogs.store') }}" method="post" id="add-blogs-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required placeholder="Add Blog Title"
                                value="{{ old('title') }}">
                            @error('title')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Title Description</label>
                            <textarea name="title_description" class="form-control" cols="30" rows="3" required
                                placeholder="Add Blog Meta Description">{{ old('title_description') }}</textarea>
                            @error('title_description')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Feature Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" required>
                            @error('image')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Body Content</label> <span
                                style="font-size: 12px; color:crimson;"><b>(Minimum Character count for Body Content is 100
                                    Characters)</b></span>
                            <textarea class="textarea" name="content" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('content') }}</textarea>
                            @error('content')
                                <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Main Tag Line</label>
                            <input type="text" name="main_tag_line" class="form-control" required
                                placeholder="Add Blog Meta Title" value="{{ old('main_tag_line') }}">
                            @error('main_tag_line')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control" required
                                placeholder="Add Blog Meta Title" value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" class="form-control" cols="30" rows="3" required
                                placeholder="Add Blog Meta Description">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Meta Keywords</label>
                            <textarea name="meta_keywords" class="form-control" cols="30" rows="3" required
                                placeholder="Add Blog Meta Keywords">{{ old('meta_keywords') }}</textarea>
                            @error('meta_keywords')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" required placeholder="Add Blog Slug"
                                value="{{ old('slug') }}">
                            @error('slug')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleSelectRounded0">Add Category</label>
                            <select name="category" required class="custom-select rounded-0" id="exampleSelectRounded0">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $singleCategory)
                                    <option value="{{ $singleCategory->id }}"
                                        {{ old('category') == $singleCategory->id ? 'selected' : '' }}>
                                        {{ $singleCategory->category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleSelectRounded0">Blog Tags</label>
                            <input type="text" name="tags" class="form-control"
                                placeholder="Add Tags Comma Separated Values (blog,work,health)"
                                value="{{ old('tags') }}">
                            @error('tags')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="text-center form-group">
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a href="{{ route('blogs.list') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
