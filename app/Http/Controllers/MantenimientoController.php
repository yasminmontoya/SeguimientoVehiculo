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
            'fase_nombre'   => 'required | string | max:60',
            'fase_estado'   => 'required | string | in:terminado,en curso,sin realizar',
            'vehiculo_id'   => 'required | integer',
        ]);

        $mantenimiento = new Mantenimiento();

        $mantenimiento->fill([
            'fase_nombre'    => $request->fase_nombre,
            'fase_estado'    => $request->fase_estado,
            'vehiculo_id'    => $request->vehiculo_id,
        ])->save();

        $servicio_id= $request->vehiculo_id;

        return  redirect('/mantenimientos/vehiculo/'.$servicio_id);
    }

    public function index(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $mantenimientos = Mantenimiento::all();

        return view('mantenimientos.index',['mantenimientos' => $mantenimientos])->withVehiculo($vehiculo);

    }

    public function edit(Request $request, $id)
    {
            try
        {
            $mantenimiento = Mantenimiento::findOrFail($id);

            return view('mantenimientos.edit')->withMantenimiento($mantenimiento);
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
            'fase_nombre'   => 'required | string | max:60',
            'fase_estado'   => 'required | string | in:terminado,en curso,sin realizar',
            'vehiculo_id'   => 'required | integer',
        ]);


        $input = $request->all();

        $mantenimiento->fill($input)->save();

        Session::flash('flash_message', 'El vehiculo se ha actualizado exitosamente!');

        return  redirect()->back();
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
