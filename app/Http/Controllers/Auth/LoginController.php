<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // 🔥 INI YANG DIUBAH TOTAL (hapus redirectTo lama)
    protected function redirectTo()
    {
        if (auth()->user()->role == 'admin') {
            return '/admin/dashboard';
        }

        return '/';
    }
}