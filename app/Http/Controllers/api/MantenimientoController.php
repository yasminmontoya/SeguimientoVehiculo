<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mantenimiento;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class MantenimientoController extends Controller
{
    public function listAll(Request $request)
    {
        try
      {
        $response = Mantenimiento::all();

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
          $response = Mantenimiento::findOrFail($id);
          $statusCode = 200;  // OK
      }
      catch (ModelNotFoundException $e)
      {
        $response = null;
        $statusCode = 404;  // Not Found
      }

      return response()->json($response, $statusCode);


    }

}
