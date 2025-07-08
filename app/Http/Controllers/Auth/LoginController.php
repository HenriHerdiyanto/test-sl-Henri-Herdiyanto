<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Override fungsi bawaan Laravel untuk redirect setelah login.
     */
    protected function redirectTo()
    {
        $role = Auth::user()->role;

        return match ($role) {
            'superadmin' => '/dashboard/superadmin',
            'manager' => '/dashboard/manager',
            'staff' => '/dashboard/staff',
            // default => '/home', // fallback
        };
    }

    /**
     * Konstruktor
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
