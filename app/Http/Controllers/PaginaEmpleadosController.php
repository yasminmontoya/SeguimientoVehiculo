<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Vehiculo;
use App\Servicio;
use App\Fase;
use App\Mantenimiento;

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
    public function area(Request $request)
    {
        $vehiculos = Vehiculo::all();
        return view('paginaEmpleados/area', ['vehiculos' => $vehiculos]);
    }

    public function area2(Request $request,$id)
    {
        $servicios = Servicio::all();
        $fases = Fase::all();
        $vehiculo = Vehiculo::findOrFail($id);

        return view('paginaEmpleados/area2', ['servicios' => $servicios],['fases' => $fases])->withVehiculo($vehiculo);
    }

    public function area3(Request $request,$id)
    {
        $datos = Input::get('fase');
        $fases = Fase::all();
        $vehiculo = Vehiculo::findOrFail($id);

        return view('paginaEmpleados/area3',['datos' => $datos],['fases' => $fases])->withVehiculo($vehiculo);
    }

}

