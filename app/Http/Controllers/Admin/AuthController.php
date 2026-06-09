<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->get('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $validUsername = config('admin.username');
        $passwordHash  = config('admin.password_hash');

        if (
            $request->username === $validUsername &&
            !empty($passwordHash) &&
            Hash::check($request->password, $passwordHash)
        ) {
            session()->put('admin_authenticated', true);
            session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Kullanıcı adı veya şifre hatalı.',
        ])->withInput(['username' => $request->username]);
    }

    public function logout(Request $request)
    {
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
