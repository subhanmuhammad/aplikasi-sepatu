<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Http\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            return redirect('/dashboard');
        }
        return view('admin/login/login');
    }

    public function authenticate(Request $request)
    {
        $credential = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credential)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                $request->session()->regenerate();
                return redirect('/dashboard');
            } elseif ($user->level == 'user') {
                $request->session()->regenerate();
                return redirect('/sepatu');
            }
            return redirect('/login');
        }

        return back()->with('loginError', 'login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
