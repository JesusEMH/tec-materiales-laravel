<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::all();

        return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $vehiculos
            ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $vehiculo = Vehiculo::create($request->all());

        if(!$vehiculo){
            return response()->json(
                $data = [
                    "message" => "lo siento!, algo ha salido mal",
                    "code" => "404",
                    "status" => "error"

                ], 404);

        }else{
            return response()->json([
                    "message" => "todo ha salido bien",
                    "code" => 200,
                    "status" => "success",
                    "elemento_creado" => $vehiculo
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::find($id);

        if(is_object($vehiculo)){
            return Response()->json([
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "elementos" => $vehiculo,
                ]
            , 200); 
        }else{
            return Response()->json([
                    'message' => 'lo siento!, algo ha salido mal',
                    'code' => '404',
                    'status' => 'error'
                ]
            , 404);

        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->all());

        if(!$vehiculo){
            return response()->json([
                    'message' => 'lo siento!, algo ha salido mal',
                    'code' => '404',
                    'status' => 'error'
                ]

            , 404);

        }else{
            return response()->json([
                    'message' => 'todo ha salido bien',
                    'code' => '200',
                    'status' => 'success',
                    'elemento_actualizado' => $vehiculo
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        if(empty($vehiculo)){
            return response()->json([
                    "message" => "lo siento!, algo ha salido mal",
                    "code" => 404,
                    "status" => "error"
                ], 404);

        }else{
            return response()->json([
                    "message" => "todo ha salido bien",
                    "code" => 200,
                    "status" => "success",
                    "elemento_borrado" => $vehiculo
                ],200);

        }
    }
}
