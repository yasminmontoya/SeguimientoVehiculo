<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Mantenimiento;
use App\Fase;
use App\Servicio;
use App\Vehiculo;
use Session;
use Response;

class MantenimientoController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:empleados');
    }

    public function create(Request $request, $vehiculo_id)
    {
        $vehiculo = Vehiculo::findOrFail($vehiculo_id);
        $servicios = Servicio::all();

        return view('mantenimientos.create',['servicios' => $servicios])->withVehiculo($vehiculo);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fase_id'       => 'required | integer',
            'estado'   => 'required | string | in:terminado,en curso,sin realizar',
            'vehiculo_id'   => 'required | integer',
        ]);

        $input = $request->all();

        Mantenimiento::create($input);

        $servicio_id= $request->vehiculo_id;

        return  redirect('empleados/mantenimientos/vehiculo/'.$servicio_id);
    }

    public function index(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $mantenimientos = Mantenimiento::all();

        $fases = Fase::all();

        return view('mantenimientos.index',['mantenimientos' => $mantenimientos],['fases' => $fases])->withVehiculo($vehiculo);

    }

    public function edit(Request $request, $id)
    {
            try
        {
            $mantenimiento = Mantenimiento::findOrFail($id);

            $fases = Fase::all();

            return view('mantenimientos.edit',['fases' => $fases])->withMantenimiento($mantenimiento);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El vehiculo con el id= $id no se pudo encontrar para ser editado!");

            return redirect()->back();
        }
    }

     public function update(Request $request, $id)
    {
      try
      {
        $mantenimiento = Mantenimiento::findOrFail($id);

        $this->validate($request, [
            'fase_id'       => 'required | integer',
            'estado'        => 'required | string | in:terminado,en curso,sin realizar',
            'vehiculo_id'   => 'required | integer',
        ]);


        $input = $request->all();

        $mantenimiento->fill($input)->save();

        $servicio_id= $request->vehiculo_id;

        Session::flash('flash_message', 'El vehiculo se ha actualizado exitosamente!');

        return redirect('empleados/mantenimientos/vehiculo/'.$servicio_id);
      }
        catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message', "El vehiculo con el id= $id no se pudo encontrar para ser editado!");

        return redirect()->back();
      }
    }

    public function destroy(Request $request, $id)
    {
        try
        {
            $mantenimiento = Mantenimiento::findOrFail($id);

            $mantenimiento->delete();

            Session::flash('flash_message', 'El vehiculo se ha eliminado exitosamente!');

            return redirect()->back();
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El vehiculo con el id= $id no se pudo encontrar para ser eliminado!");

            return redirect()->back();
        }
    }

    public function select(){
        $id = Input::get('option');
        $fases = Fase::where('servicio_id','=',$id)->get();
        return Response::json($fases);
    }
}
