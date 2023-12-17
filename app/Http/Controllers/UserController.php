<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('admin.auth.list', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auth.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // Handle file upload (profile picture)
        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->getClientOriginalExtension();
            $profilePicturePath = $request->profile_picture->move(public_path('images/'), $imageName);

            // $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            // If no file is uploaded, sets default profile picture to null.
            $profilePicturePath = null;
        }

        $user = User::create([
            'picture' => $profilePicturePath,
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'email' => $request->input('email'),
            'role' => $request->role,
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully.');
    }


    // Shows Actual User Profile
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.auth.edituser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,others',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required',
            'password' => 'nullable|string|min:8',
        ]);

        $data = $request->except(['password']);
        $user = User::find($request->id);

        // Handle profile picture update
        if ($request->file('profile_picture')) {
            //if user has picture unlinks
            if ($user->picture) {
                unlink("images/" . $user->picture);
            }
            $author_image = time() . '1' . '.' . $request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/'), $author_image);
            $data['picture'] = $author_image;
        } else {
            $author_image = $user->picture;
            $data['picture'] = $author_image;
        }

        // Update the user information
        $user->update($data);

        // Update password if provided
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function userProfile()
    {
    }
}
