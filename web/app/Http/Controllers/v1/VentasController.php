<?php

namespace App\Http\Controllers\v1;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\v1\Venta;

class VentasController extends Controller
{
    function getAll()
    {
        $response= new \stdClass();
        
        $ventas = Venta::all();
    
        $response->success=true;
        $response->data = $ventas;

        return response()->json($response,200);
    }

    function getItem($id)
    {
        $response= new \stdClass();
        $venta = Venta::find($id);
    
        $response->success=true;
        $response->data = $venta;

        return response()->json($response,200);
    }

    function store(Request $request)
    {
        $response= new \stdClass();

        $venta = new Venta();

        $venta->codigo_venta = $request->codigo_venta;
        $venta->nombre_producto = $request->nombre_producto;
        $venta->descripcion = $request->descripcion;
        $venta->cantidad = $request->cantidad;
        $venta->precio_unitario = $request->precio_unitario;
        $venta->precio_total = $request->precio_total;
        $venta->fecha_operacion = $request->fecha_operacion;
        $venta->metodo_pago = $request->metodo_pago;
        $venta->nombre_cliente = $request->nombre_cliente;
        $venta->documento_identidad = $request->documento_identidad;
        $venta->save();

        $response->success=true;
        $response->data = $venta;

        return response()->json($response,200);
    }

    function putUpdate(Request $request)
    {
        $response= new \stdClass();

        $venta = Venta::find($request->id);

        if($venta)
        {
            $venta->codigo_venta = $request->codigo_venta;
            $venta->nombre_producto = $request->nombre_producto;
            $venta->descripcion = $request->descripcion;
            $venta->cantidad = $request->cantidad;
            $venta->precio_unitario = $request->precio_unitario;
            $venta->precio_total = $request->precio_total;
            $venta->fecha_operacion = $request->fecha_operacion;
            $venta->metodo_pago = $request->metodo_pago;
            $venta->nombre_cliente = $request->nombre_cliente;
            $venta->documento_identidad = $request->documento_identidad;
            $venta->save();

            $response->success=true;
            $response->data = $venta;
        }
        else
        {
            $response->success=false;
            $response->message = ["El registro ".$request->id."no existe."];
        }

        return response()->json($response,($response->success)?200:401);
    }

    function patchUpdate(Request $request)
    {
        $response= new \stdClass();

        $venta = Venta::find($request->id);
        if($venta)
        {
            if($request->codigo_venta)
            $venta->codigo_venta = $request->codigo_venta;

            if($request->nombre_producto);
            $venta->nombre_producto = $request->nombre_producto;

            if($request->descripcion)
            $venta->descripcion = $request->descripcion;

            if($request->cantidad)
            $venta->cantidad = $request->cantidad;

            if($request->precio_unitario)
            $venta->precio_unitario = $request->precio_unitario;

            if($request->precio_total)
            $venta->precio_total = $request->precio_total;

            if($request->fecha_operacion)
            $venta->fecha_operacion = $request->fecha_operacion;

            if($request->metodo_pago)
            $venta->metodo_pago = $request->metodo_pago;

            if($request->nombre_cliente)
            $venta->nombre_cliente = $request->nombre_cliente;

            if($request->documento_identidad)
            $venta->documento_identidad = $request->documento_identidad;

            $venta->save();

            $response->success=true;
            $response->data = $venta;
        }
        else
        {
            $response->success=false;
            $response->message = ["El registro ".$request->id."no existe."];
        }

        return response()->json($response,($response->success)?200:401);
    }

    function delete($id)
    {
        $response= new \stdClass();

        $venta = Venta::find($id);

        if($venta)
        {
            $venta->delete();

            $response->success=true;
            $response->data = $venta;
        }
        else
        {
            $response->success=false;
            $response->message = ["El registro ".$id."no existe."];
        }

        return response()->json($response,($response->success)?200:401);
    }
}