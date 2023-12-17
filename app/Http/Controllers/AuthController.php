<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showAdminLoginForm()
    {
        return view('admin.auth.login');
    }
    public function showAuthorRegisterForm()
    {
        return view('frontend.auth.register');
    }
    public function showAuthorLoginForm()
    {
        return view('frontend.auth.login');
    }
    public function registerAuthor(Request $request)
    {

        $user = User::register($request);
        Auth::login($user);
        return redirect()->route('admin.dashboard')->with('success', 'Congratulations Account Created Successfully.');
    }



    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $request->session()->regenerate();

            // Attempt login with provided credentials
            if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
            }

            // Handle invalid email address
            if (!User::where('email', $credentials['email'])->exists()) {
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'The provided email address does not exist.',
                ]);
            }

            // Handle invalid password
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        } catch (Exception $e) {
            // Handle any unexpected exceptions
            return back()->withErrors([
                'message' => 'An error occurred during login.',
                'error' => $e->getMessage(), // Only log this internally, don't expose to user
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
