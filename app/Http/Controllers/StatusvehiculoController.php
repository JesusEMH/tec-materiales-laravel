<?php

namespace App\Http\Controllers;

use App\Statusvehiculo;
use Illuminate\Http\Request;

class StatusvehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Statusvehiculo::all();

        return response()->json([
            "code" => 200,
            "status" => "success",
            "elementos" => $status
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
        $status = Statusvehiculo::create($request->all());

        if(!$status){
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
                    "elemento_creado" => $status
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statusvehiculo  $statusvehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Statusvehiculo $statusvehiculo)
    {
        if($statusvehiculo){
            return response()->json([
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "cargo" => $statusvehiculo,
                ]
            , 200); 
        }else{
            return response()->json([
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
     * @param  \App\Statusvehiculo  $statusvehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statusvehiculo $statusvehiculo)
    {
        $statusvehiculo->update($request->all());

        if(!$statusvehiculo){
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
                    'elemento_actualizado' => $statusvehiculo
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statusvehiculo  $statusvehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statusvehiculo $statusvehiculo)
    {
        $statusvehiculo->delete();

        if(empty($statusvehiculo)){
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
                    "elemento_borrado" => $statusvehiculo
                ],200);

        }
    }
}
