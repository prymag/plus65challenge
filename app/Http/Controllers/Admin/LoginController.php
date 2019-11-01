<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    //
    public function __construct()
    {
        # code...
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function username()
    {
        return 'username';
    }
}
