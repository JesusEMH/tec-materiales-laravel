<?php

namespace App\Http\Controllers;

use App\Espacio;
use Illuminate\Http\Request;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $espacio = Espacio::all();

        return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $espacio
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
        $espacio = Espacio::create($request->all());

        if(!$espacio){
            return response()->json(
                $data = [
                    "message" => "lo siento!, algo ha salido mal",
                    "code" => "404",
                    "status" => "error"

                ], 404);

        }else{
            return response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                    "code" => 200,
                    "status" => "success",
                    "elemento_creado" => $espacio
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function show(Espacio $espacio)
    {
        if($espacio){
            return response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "cargo" => $espacio,
                ]
            , 200); 
        }else{
            return response()->json(
                $data = [
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
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espacio $espacio)
    {
        $espacio->update($request->all());

        if(!$espacio){
            return response()->json(
                $data = [
                    'message' => 'lo siento!, algo ha salido mal',
                    'code' => '404',
                    'status' => 'error'
                ]

            , 404);

        }else{
            return response()->json(
                $data = [
                    'message' => 'todo ha salido bien',
                    'code' => '200',
                    'status' => 'success',
                    'elemento_actualizado' => $espacio
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espacio $espacio)
    {
        $espacio->delete();

        if(empty($espacio)){
            return response()->json(
                $data = [
                    "message" => "lo siento!, algo ha salido mal",
                    "code" => 404,
                    "status" => "error"
                ], 404);

        }else{
            return response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                    "code" => 200,
                    "status" => "success",
                    "elemento_borrado" => $espacio
                ],200);

        }
    }
}
