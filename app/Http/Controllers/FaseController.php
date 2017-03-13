<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fase;
use App\Servicio;
use Session;

class FaseController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admins');
    }
    
    public function create(Request $request,$id)
    {
           try
        {
            $servicio = Servicio::findOrFail($id);

            return view('fases.create')->withServicio($servicio);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El servicio con el id= $id no se pudo encontrar para ser editado!");

            return redirect()->back();
        }

    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'      => 'required | string | max:60',
        ]);
        
        $input = $request->all();

        Fase::create($input);

        return redirect()->back();
    }
    
    public function index(Request $request, $id)
    {
        $fases = Fase::all();
        $servicio = Servicio::findOrFail($id);
        
        return view('fases.index', ['fases' => $fases])->withServicio($servicio);
    }
    
    public function edit(Request $request, $id)
    {
           try
        {
            $fase = Fase::findOrFail($id);

            $servicios = Servicio::all();

            return view('fases.edit',['servicios' => $servicios])->withFase($fase);
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
        $fase = Fase::findOrFail($id);

        $this->validate($request, [
            'nombre'      => 'required | string |max:60',
        ]);

        $input = $request->all();

        $fase->fill($input)->save();

        Session::flash('flash_message', 'La fase se ha actualizado exitosamente!');

        return redirect()->back();;
      }
        catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message', "La fase con el id= $id no se pudo encontrar para ser editado!");

        return redirect()->back();
      }
    }
    
    public function destroy(Request $request, $id)
    {
        try
        {
            $fase = Fase::findOrFail($id);

            $fase->delete();

            Session::flash('flash_message', 'La fase se ha eliminado exitosamente!');

            return redirect()->back();
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "La fase con el id= $id no se pudo encontrar para ser eliminado!");

            return redirect()->back();
        }
    }
}
