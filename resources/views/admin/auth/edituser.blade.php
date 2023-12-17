@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Edit User</h2>

                    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" hidden name="id" value="{{ $user->id }}" id="">
                        <!-- Simple File Input for User Profile Picture -->
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" name="profile_picture" class="form-control" accept="image/*">
                            @error('profile_picture')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <!-- Basic User Info Form -->
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $user->name }}" required>
                            @error('name')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="others" {{ $user->gender === 'others' ? 'selected' : '' }}>Others</option>
                            </select>
                            @error('gender')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ $user->email }}" required>
                            @error('email')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        {{-- User Role --}}
                        <div class="form-group">
                            <label for="user_role">User Role</label>
                            <select name="role" class="custom-select" id="user_role" required>
                                <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <!-- Password Form -->
                        <div class="form-group">
                            <label for="password">New Password (Leave blank to keep the same)</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @error('password')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center form-group">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
