<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:administrator')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.administrator-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if(Auth::guard('administrator')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('administrator.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
