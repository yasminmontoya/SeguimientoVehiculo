<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

     protected $redirectTo = '/servicios';
    
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

        return $this->sendFailedLoginResponse($request);
            
     }
}
