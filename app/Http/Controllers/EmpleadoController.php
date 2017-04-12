<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use Session;
use Illuminate\Support\Facades\Crypt;

class EmpleadoController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admins');
    }


    public function create(Request $request)
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required | string | max:100',
            'apellidos'    => 'required | string | max:100',
            'telefono'     => 'required | string | max:100',
            'email'        => 'required| email',
            'password'     => 'required | min:6',
        ]);

        $empleado = new Empleado();

        $empleado->fill([
            'name'         => $request->name,
            'apellidos'    => $request->apellidos,
            'telefono'     => $request->telefono,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
        ])->save();

        return redirect('empleados');
    }

    public function index(Request $request)
    {

        $empleados = Empleado::all();

        return view('empleados.index', ['empleados' => $empleados]);

    }

    public function show(Request $request, $id)
    {

        try
        {
             $empleado = Empleado::findOrFail($id);

            return view('empleados.show')->withEmpleado($empleado);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El empleado con el id = $id no fue encontrado!");

            return redirect()->back();
        }
    }

    public function edit(Request $request, $id)
    {
            try
        {
            $empleado = Empleado::findOrFail($id);

            return view('empleados.edit')->withEmpleado($empleado);
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El empleado con el id= $id no se pudo encontrar para ser editado!");

            return redirect()->back();
        }
    }

     public function update(Request $request, $id)
    {
      try
      {
        $empleado = Empleado::findOrFail($id);

         $this->validate($request, [
            'name'       => 'required | string | max:100',
            'apellidos'    => 'required | string | max:100',
            'telefono'     => 'required | string | max:100',
            'email'        => 'required| email',
            'password'     => 'required | min:6',
        ]);

        $empleado->fill([
            'name'         => $request->name,
            'apellidos'    => $request->apellidos,
            'telefono'     => $request->telefono,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
        ])->save();

        Session::flash('flash_message', 'El empleado se ha actualizado exitosamente!');

        return redirect('empleados');
      }
        catch(ModelNotFoundException $e)
      {
        Session::flash('flash_message', "El empleado con el id= $id no se pudo encontrar para ser editado!");

        return redirect()->back();
      }
    }

    public function destroy(Request $request, $id)
    {
        try
        {
            $empleado = Empleado::findOrFail($id);

            $empleado->delete();

            Session::flash('flash_message', 'El empleado se ha eliminado exitosamente!');

            return redirect('empleados');
        }
            catch(ModelNotFoundException $e)
        {
            Session::flash('flash_message', "El empleado con el id= $id no se pudo encontrar para ser eliminado!");

            return redirect()->back();
        }
    }

}

