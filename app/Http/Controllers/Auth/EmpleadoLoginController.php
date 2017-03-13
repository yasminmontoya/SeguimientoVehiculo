<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class EmpleadoLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'paginaEmpleados/area';

    function __construct()
    {
        $this->middleware('guest:empleados');
    }

     public function showLoginForm()
    {
        return view('paginaEmpleados/login');
    }

      public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required| email',
            'password' => 'required | min:6',
        ]);

        if(Auth::guard('empleados')->attempt(['email' => $request->email,'password' => $request->password], $request->remember)){
            return redirect()->intended(route('empleado.area'));
        }

        return $this->sendFailedLoginResponse($request);

     }

}
