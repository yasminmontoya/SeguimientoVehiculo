<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo;
use Session;
use App\Http\Controllers\Gate;
use App\User;

class VehiculoController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }
    
    
    public function create(Request $request)
    {
        return view('vehiculos.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'placa'       => 'required | string | alpha_num | max:6',
            'marca'       => 'required | string | max:100',
            'linea'       => 'required | string | max:100',
            'modelo'      => 'required | integer',
        ]);
        
        
        $input = $request->all();

        Vehiculo::create($input);

        return redirect('vehiculos');
    }
    
    public function index(Request $request,Vehiculo $vehiculo)
    {
        
        $vehiculos = Vehiculo::all();

        return view('vehiculos.index', ['vehiculos' => $vehiculos]);
     
    }
    
    public function show(Request $request, $id)
    {
       
        try
        {
             $vehiculo = Vehiculo::findOrFail($id);
        
            return view('vehiculos.show')->withVehiculo($vehiculo);
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
            $vehiculo = Vehiculo::findOrFail($id);

            return view('vehiculos.edit')->withVehiculo($vehiculo);
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
        $vehiculo = Vehiculo::findOrFail($id);

        $this->validate($request, [
            'placa'       => 'required | string | alpha_num | max:6',
            'marca'       => 'required | string | max:100',
            'linea'       => 'required | string | max:100',
            'modelo'      => 'required | integer',
        ]);

        $input = $request->all();

        $vehiculo->fill($input)->save();

        Session::flash('flash_message', 'El vehiculo se ha actualizado exitosamente!');

        return redirect('vehiculos');
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
            $vehiculo = Vehiculo::findOrFail($id);

            $vehiculo->delete();

            Session::flash('flash_message', 'El vehiculo se ha eliminado exitosamente!');

            return redirect('vehiculos');
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El vehiculo con el id= $id no se pudo encontrar para ser eliminado!");

            return redirect()->back();
        }
    }

}
