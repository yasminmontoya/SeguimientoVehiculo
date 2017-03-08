<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servicio;
use Session;

class ServicioController extends Controller
{
      public function __construct()
    {
         $this->middleware('auth:admins');
    }
    
    public function create(Request $request)
    {
        return view('servicios.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'      => 'required | string | max:60',
        ]);
        
        $input = $request->all();

        Servicio::create($input);

        return redirect('servicios');
    }
    
    public function index(Request $request)
    {
        $servicios = Servicio::all();

        return view('servicios.index', ['servicios' => $servicios]);
    }
    
    public function show(Request $request, $id)
    {
       
        try
        {
            $servicio = Servicio::findOrFail($id);
        
            return view('servicios.show')->withServicio($servicio);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El servicio con el id = $id no fue encontrado!");

            return redirect()->back();
        }
    }
    
    public function edit(Request $request, $id)
    {
            try
        {
            $servicio = Servicio::findOrFail($id);

            return view('servicios.edit')->withServicio($servicio);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El servicio con el id= $id no se pudo encontrar para ser editado!");

            return redirect()->back();
        }
    }
    
     public function update(Request $request, $id)
    {
      try
      {
        $servicio = Servicio::findOrFail($id);

        $this->validate($request, [
            'nombre'      => 'required | string | max:60',
        ]);

        $input = $request->all();

        $servicio->fill($input)->save();

        Session::flash('flash_message', 'El servicio se ha actualizado exitosamente!');

        return redirect('servicios');
      }
        catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message', "El servicio con el id= $id no se pudo encontrar para ser editado!");

        return redirect()->back();
      }
    }
    
    public function destroy(Request $request, $id)
    {
        try
        {
            $servicio = Servicio::findOrFail($id);

            $servicio->delete();

            Session::flash('flash_message', 'El servicio se ha eliminado exitosamente!');

            return redirect('servicios');
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El servicio con el id= $id no se pudo encontrar para ser eliminado!");

            return redirect()->back();
        }
    }
}
