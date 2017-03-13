<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaEmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:empleados');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function area()
    {
        return view('paginaEmpleados/area');
    }
}
