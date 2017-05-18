<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Administrador;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class AdminController extends Controller
{
    public function create(Request $request)
    {

      try
      {
        $response = Administrador::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

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
