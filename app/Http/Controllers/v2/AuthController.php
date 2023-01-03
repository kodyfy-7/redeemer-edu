<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        // Attempt to log the user in
        // if(Auth::/*guard('administrator')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        // {
        //     return redirect()->intended(route('administrator.dashboard'));
        // }

        // // if unsuccessful
        // return redirect()->back()->withInput($request->only('email','remember'));
        if(auth()->attempt(array('username' => $request->username, 'password' => $request->password)))
        {
            //return auth()->user()->role->role_slug;
            return redirect()->route('home');
            // if (auth()->user()->type == 'admin') {
            //     return redirect()->route('admin.home');
            // }else if (auth()->user()->type == 'manager') {
            //     return redirect()->route('manager.home');
            // }else{
            //     return redirect()->route('home');
            // }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
