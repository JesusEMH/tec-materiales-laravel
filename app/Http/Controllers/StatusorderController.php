<?php

namespace App\Http\Controllers;

use App\Statusorder;
use Illuminate\Http\Request;

class StatusorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Statusorder::all();

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
        $status = Statusorder::create($request->all());

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
     * @param  \App\Statusorder  $statusorder
     * @return \Illuminate\Http\Response
     */
    public function show(Statusorder $statusorder)
    {
        if($statusorder){
            return response()->json([
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "cargo" => $statusorder,
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
     * @param  \App\Statusorder  $statusorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statusorder $statusorder)
    {
        $statusorder->update($request->all());

        if(!$statusorder){
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
                    'elemento_actualizado' => $statusorder
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Statusorder  $statusorder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statusorder $statusorder)
    {
        $statusorder->delete();

        if(empty($statusorder)){
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
                    "elemento_borrado" => $statusorder
                ],200);

        }
    }
}
