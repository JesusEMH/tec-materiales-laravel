<?php

namespace App\Http\Controllers;

use App\Subdirection;
use Illuminate\Http\Request;

class SubdirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subdirection = Subdirection::all();

        return response()->json([
            "code" => 200,
            "status" => "success",
            "elementos" => $subdirection
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
        $subdirection = Subdirection::create($request->all());

        if(!$subdirection){
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
                    "elemento_creado" => $subdirection
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subdirection  $subdirection
     * @return \Illuminate\Http\Response
     */
    public function show(Subdirection $subdirection)
    {
        if($subdirection){
            return response()->json([
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "cargo" => $subdirection,
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
     * @param  \App\Subdirection  $subdirection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdirection $subdirection)
    {
        $subdirection->update($request->all());

        if(!$subdirection){
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
                    'elemento_actualizado' => $subdirection
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subdirection  $subdirection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdirection $subdirection)
    {
        $subdirection->delete();

        if(empty($subdirection)){
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
                    "elemento_borrado" => $subdirection
                ],200);

        }
    }
}
