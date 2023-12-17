@extends('admin.index')

@section('admin-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <h2>Add User</h2>

                    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Simple File Input for User Profile Picture -->
                        <div class="form-group">
                            <label for="profile_picture">Profile Picture</label>
                            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                            @error('profile_picture')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <!-- Basic User Info Form -->
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            @error('name')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                            @error('gender')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            @error('email')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <!-- User Role Dropdown -->
                        <div class="form-group">
                            <label for="user_role">User Role</label>
                            <select name="role" class="custom-select" id="user_role" required>
                                <option value="author">Author</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <!-- Password Form -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            @error('password')
                                <br> <label style="color:red">{{ $message }}</label>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center form-group">
                            <button class="btn btn-primary" type="submit">Add</button>
                            <a href="{{ route('users.index') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
