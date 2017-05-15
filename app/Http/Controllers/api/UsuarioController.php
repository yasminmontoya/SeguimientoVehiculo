<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    public function listAll(Request $request)
    {
        try
      {
        $response = User::all();

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
          $response = User::findOrFail($id);
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

      try
      {
        $response = User::create([
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

    public function update(Request $request, $id)
    {
        try
      {
        $usuario = User::findOrFail($id);
      }
      catch (ModelNotFoundException $e)
      {
        return response()->json(null, 404);  // Not Found
      }

      $response = $usuario->fill([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ])->save();

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
        $usuario = User::findOrFail($id);
      }
      catch (ModelNotFoundException $e)
      {
        return response()->json(null, 404);  // Not Found
      }

      try
      {
        $response = $usuario->delete();
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
