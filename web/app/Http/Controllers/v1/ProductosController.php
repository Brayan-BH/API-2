<?php

namespace App\Http\Controllers\v1;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Producto;

use stdClass;

class ProductosController extends Controller
{
    function getAll()
    {
        $response= new \stdClass();
        
        $productos = Producto::all();
    
        $response->success=true;
        $response->data = $productos;

        return response()->json($response,200);
    }

    function getItem($id)
    {
        $response= new \stdClass();
        $producto = Producto::find($id);
    
        $response->success=true;
        $response->data = $producto;

        return response()->json($response,200);
    }

    function store(Request $request)
    {
        $response= new \stdClass();

        $producto = new Producto();

        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->categoria = $request->categoria;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();


        $response->success=true;
        $response->data = $producto;
        return response()->json($response,200);   
    }

    function putUpdate(Request $request)
    {
        $response= new \stdClass();

        $producto=Producto::find($request->id);

        if($producto)
        {
            $producto->codigo = $request->codigo;
            $producto->nombre = $request->nombre;
            $producto->categoria = $request->categoria;
            $producto->descripcion = $request->descripcion;
            $producto->precio = $request->precio;
            $producto->stock = $request->stock;
            $producto->save();

            $response->success=true;
            $response->data = $producto;
        }
        else
        {
            $response->success=false;
            $response->erros=["el producto con el id ".$request->id." no existe"];
        }

        
        return response()->json($response,($response->success?200:401));

    }

    function patchUpdate(Request $request)
    {
        $response= new \stdClass();

        $producto=Producto::find($request->id);

        if($producto)
        {
            if($request->codigo)
            $producto->codigo = $request->codigo;

            if($request->nombre)
            $producto->nombre = $request->nombre;

            if($request->categoria)
            $producto->categoria = $request->categoria;

            if($request->descripcion)
            $producto->descripcion = $request->descripcion;

            if($request->precio)
            $producto->precio = $request->precio;

            if($request->stock)
            $producto->stock = $request->stock;

            $producto->save();

            $response->success=true;
            $response->data = $producto;
        }
        else
        {
            $response->success=false;
            $response->erros=["el producto con el id ".$request->id." no existe"];
        }
        
        return response()->json($response,($response->success?200:401));

    }

    function delete($id)
    {
        $response= new \stdClass();

        $producto=Producto::find($id);

        if($producto)
        {
            $producto->delete();
            $response->success=true;
        }
        else
        {
            $response->success=false;
            $response->erros=["el producto con el id ".$id." no existe"];
        }

        return response()->json($response,($response->success?200:401));
    }
}