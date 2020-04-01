<?php

namespace App\Http\Controllers;

use App\Estudios;
use Illuminate\Http\Request;

class EstudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudio = Estudios::all();

        return response()->json([
            "code" => 200,
            "status" => "success",
            "elementos" => $estudio
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
        $estudios = Estudios::create($request->all());

        if(!$estudios){
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
                    "elemento_creado" => $estudios
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function show(Estudios $estudios)
    {
        if($estudios){
            return response()->json([
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "cargo" => $estudios,
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudios $estudios)
    {
        $estudios->update($request->all());

        if(!$estudios){
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
                    'elemento_actualizado' => $estudios
                ]
            ,200);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudios $estudios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudios $estudios)
    {
        $estudios->delete();

        if(empty($estudios)){
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
                    "elemento_borrado" => $estudios
                ],200);

        }
    }
}
