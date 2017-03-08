<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    
    function __construct()
    {
        $this->middleware('guest:admins');
    }
    
     public function showLoginForm()
    {
        return view('administrators/login');
    }
    
      public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required| email', 
            'password' => 'required | min:6',
        ]);
        
        if(Auth::guard('admins')->attempt(['email' => $request->email,'password' => $request->password], $request->remember)){
            return redirect()->intended(route('admin.area'));
        }
           return redirect()->back()->withInput($request->only('email','remember'));
            
     }
}
