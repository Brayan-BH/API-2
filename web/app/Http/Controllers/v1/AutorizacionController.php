<?php
 
namespace App\Http\Controllers\v1;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

 
//insertar, editar, eliminar
class AutorizacionController extends Controller
{
    function login (Request $request)
    {   
        $response= new \stdClass();
        $response->success = true;
        $response->data = new \stdClass();

        $user = User::Where("email", $request->email)->Where("password", $request->password)->first(); //query builder

        // return $user;

        if($user)
        {
           $response->data->token = $user->createToken('Laravel Password Grant Client')->accessToken;
        }
        else
        {
            $response->success = false;
            $response->errors = [];
            $response->errors[] = "Usuario y/o contraseña incorrectos";
        }
        
        return response()->json($response,($response->success?200:401 ));
    }
}