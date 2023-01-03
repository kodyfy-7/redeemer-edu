<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.teacher-login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        if(Auth::guard('teacher')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('teacher.dashboard'));
        }

        // if unsuccessful
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
