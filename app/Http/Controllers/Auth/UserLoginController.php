<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            } elseif (Auth::user()->role == 'user') {
                return redirect()->route('home'); // Redirect to user dashboard
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
    // Example of using middleware in a controller constructor
    public function __construct()
    {
        $this->middleware('admin')->only('index'); // Only apply 'admin' middleware to 'index' method
    }

}
