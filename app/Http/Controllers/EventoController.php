<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
        $evento = Evento::all();

        return response()->json(
            $data = [
            "code" => 200,
            "status" => "success",
            "elementos" => $evento
        ], 200);
    }


    public function store(Request $request)
    {
        $evento = Evento::create($request->all());

        if(!$evento){
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
                    "elemento_creado" => $evento
                ]
            ,200);
        }
    }


    public function show($id)
    {
        $evento = Evento::find($id);

        if(is_object($evento)){
            return Response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "elemento" => $evento,
                ]
            , 200); 
        }else{
            return Response()->json(
                $data = [
                    'message' => 'lo siento!, algo ha salido mal',
                    'code' => '404',
                    'status' => 'error'
                ], 404);

        }
    }



    public function update(Request $request, Evento $evento)
    {
        $evento->update($request->all());

        if(!$evento){
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
                    'elemento_actualizado' => $evento
                ]
            ,200);

        }
    }


    public function destroy(Evento $evento)
    {
        $evento->delete();

        if(empty($evento)){
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
                    "elemento_borrado" => $evento
                ],200);

        }
    }
}
