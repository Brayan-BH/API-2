<?php
 
namespace App\Http\Controllers\v1;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Categoria;
 
//insertar, editar, eliminar
class CategoriasController extends Controller
{
    function getAll()
    {
        $response= new \stdClass();
        $response->success=true;
        
        $categoria = Categoria::all();
    
        $response->data = $categoria;

        return response()->json($response,200);
    }

    function getItem($id)
    {
        $response= new \stdClass();
        $categoria = Categoria::find($id);
    
        $response->success=true;
        $response->data = $categoria;

        return response()->json($response,200);
    }

    function store(Request $request)
    {
        $response= new \stdClass();

        $categoria = new Categoria();

        $categoria->codigo = $request->codigo;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = $request->estado;
        $categoria->save();


        $response->success=true;
        $response->data = $categoria;
        return response()->json($response,200);   
    }

    function putUpdate(Request $request)
    {
        $response= new \stdClass();

        $categoria = Categoria::find($request->id);

        if($categoria)
        {
            $categoria->codigo = $request->codigo;
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;
            $categoria->estado = $request->estado;
            $categoria->save();

            $response->success=true;
            $response->data = $categoria;
        }
        else
        {
            $response->success=false;
            $response->erros=["La categoria con el id ".$request->id." no existe"];
        }

        
        return response()->json($response,($response->success?200:401));

    }

    function patchUpdate(Request $request)
    {
        $response= new \stdClass();

        $categoria = Categoria::find($request->id);

        if($categoria)
        {
            if($request->codigo)
            $categoria->codigo = $request->codigo;

            if($request->nombre)
            $categoria->nombre = $request->nombre;

            if($request->descripcion)
            $categoria->descripcion = $request->descripcion;

            if($request->estado)
            $categoria->estado = $request->estado;

            $categoria->save();

            $response->success=true;
            $response->data = $categoria;
        }
        else
        {
            $response->success=false;
            $response->erros=["La categoria con el id ".$request->id." no existe"];
        }
        
        return response()->json($response,($response->success?200:401));

    }

    function delete($id)
    {
        $response= new \stdClass();

        $categoria = Categoria::find($id);

        if($categoria)
        {
            $categoria->delete();
            $response->success=true;
        }
        else
        {
            $response->success=false;
            $response->erros=["La categoria con el id ".$id." no existe"];
        }

        return response()->json($response,($response->success?200:401));
    }
   
}