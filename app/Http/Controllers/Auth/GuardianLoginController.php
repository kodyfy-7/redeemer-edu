<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuardianLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:guardian')->except('logout');
    }

    public function showLoginForm()
    {
        
        return view('auth.guardian-login');
    }

    public function login(Request $request)
    { 
        // Validate form data
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if(Auth::guard('guardian')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('guardian.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
