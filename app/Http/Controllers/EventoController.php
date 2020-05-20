<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Departamento;
use App\Espacio;
use App\User;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function index()
    {
        $evento = Evento::orderBy('fecha', 'desc')->paginate(10);

        return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $evento
            ], 200);
    }


    public function store(Request $request)
    {
        $creado = Evento::create($request->all());
        $evento = Evento::find($creado['id']);

        if(!$creado){
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
        $evento = Evento::find($id)->load('departamento')->load('espacio')->load('user');


        if(is_object($evento)){
            return Response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "elemento" => $evento
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

    public function getAntiguos()
    {
        $eventos = Evento::orderBy('fecha', 'asc')->paginate(10);

        if($eventos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $eventos
            ], 200);

        }else{
            return response()->json(
                $data = [
                    "code" => 200,
                    "status" => "error",
                    "message" => "la solicitud ha fallado"
                ], 200);
        }
    }

    public function getPorMes()
    {
        $date_start = date('Y-m-01');
        $date_end = date('Y-m-31');
       
        $eventos = Evento::whereBetween('fecha', [$date_start, $date_end])->paginate(10);


        if($eventos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $eventos
            ], 200);

        }else{
            return response()->json(
                $data = [
                    "code" => 200,
                    "status" => "error",
                    "message" => "la solicitud ha fallado"
                ], 200);
        }


    }

    public function getPorStatus()
    {
        $eventos = Evento::where('status', 'pendiente')->orderBy('fecha', 'desc')->paginate(10);


        if($eventos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $eventos
            ], 200);

        }else{
            return response()->json(
                $data = [
                    "code" => 200,
                    "status" => "error",
                    "message" => "la solicitud ha fallado"
                ], 200);
        }

    }

}
