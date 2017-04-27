<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vehiculo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class VehiculoController extends Controller
{
    public function listAll(Request $request)
    {
        try
      {
        $response = Vehiculo::all();

        $statusCode = 200;  // OK
      }
      catch (ModelNotFoundException $e)
      {
        $response = null;
        $statusCode = 404;  // Not Found
      }

      return response()->json($response, $statusCode);
    }

    public function listOne(Request $request, $id)
    {

      try
      {
          $response = Vehiculo::findOrFail($id);
          $statusCode = 200;  // OK
      }
      catch (ModelNotFoundException $e)
      {
        $response = null;
        $statusCode = 404;  // Not Found
      }

      return response()->json($response, $statusCode);


    }

    public function create(Request $request)
    {

        $input = $request->all();

      try
      {
        $response = Vehiculo::create($input);
        $statusCode = 200;  // OK
      }
      catch (QueryException $e)
      {
        $response = null;
        $statusCode = 400;  // Bad Request
      }

      return response()->json($response, $statusCode);
    }

    public function update(Request $request, $id)
    {
        try
      {
        $vehiculo = Vehiculo::findOrFail($id);
      }
      catch (ModelNotFoundException $e)
      {
        return response()->json(null, 404);  // Not Found
      }

      $input = $request->all();

      $response = $vehiculo->fill($input);

      try
      {
        $response->save();
        $statusCode = 200;  // OK
      }
      catch (QueryException $e)
      {
        $response = null;
        $statusCode = 400;  // Bad Request
      }

      return response()->json($response, $statusCode);
    }

    public function delete(Request $request, $id)
    {
        try
      {
        $vehiculo = Vehiculo::findOrFail($id);
      }
      catch (ModelNotFoundException $e)
      {
        return response()->json(null, 404);  // Not Found
      }

      try
      {
        $response = $vehiculo->delete();
        $statusCode = 200;  // OK
      }
      catch (QueryException $e)
      {
        $response = null;
        $statusCode = 400;  // Bad Request
      }

      return response()->json($response, $statusCode);

    }
}
