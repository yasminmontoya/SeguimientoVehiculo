<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mantenimiento;
use App\Fase;
use App\Servicio;
use App\Vehiculo;
use Session;

class MantenimientoController extends Controller
{
    public function create(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $fases = Fase::all();

        return view('mantenimientos.create',['fases' => $fases])->withVehiculo($vehiculo);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'fase_nombre'   => 'required | string | max:60',
            'fase_estado'   => 'required | string | in:terminado,en curso,sin realizar',
            'vehiculo_id'   => 'required | integer',
        ]);


        $input = $request->all();

        Mantenimiento::create($input);

        return  redirect()->back();
    }

    public function index(Request $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);

        $mantenimientos = Mantenimiento::all();

        return view('mantenimientos.index',['mantenimientos' => $mantenimientos])->withVehiculo($vehiculo);

    }

    public function show(Request $request, $id)
    {

        try
        {
            $mantenimiento = Mantenimiento::findOrFail($id);

            return view('mantenimientos.show')->withMantenimiento($mantenimiento);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El vehiculo con el id = $id no fue encontrado!");

            return redirect()->back();
        }
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

}
