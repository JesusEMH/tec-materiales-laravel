<?php

namespace App\Http\Controllers;

use App\Ubication;
use Illuminate\Http\Request;

class UbicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ubication = Ubication::all();

        return response()->json([
            "code" => 200,
            "status" => "success",
            "elementos" => $ubication
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
        $ubication = Ubication::create($request->all());

        if(!$ubication){
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
                    "elemento_creado" => $ubication
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ubication  $ubication
     * @return \Illuminate\Http\Response
     */
    public function show(Ubication $ubication)
    {
        if($ubication){
            return response()->json([
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "cargo" => $ubication,
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
     * @param  \App\Ubication  $ubication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ubication $ubication)
    {
        $ubication->update($request->all());

        if(!$ubication){
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
                    'elemento_actualizado' => $ubication
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ubication  $ubication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ubication $ubication)
    {
        $ubication->delete();

        if(empty($ubication)){
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
                    "elemento_borrado" => $ubication
                ],200);

        }
    }
}
