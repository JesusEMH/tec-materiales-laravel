<?php

namespace App\Http\Controllers;

use App\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenimientos = Mantenimiento::orderBy('fecha', 'desc')->paginate(10);

        return response()->json(
            $data = [
            "code" => 200,
            "status" => "success",
            "elementos" => $mantenimientos
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
        $creado = Mantenimiento::create($request->all());
        $mantenimiento = Mantenimiento::find($creado['id']);

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
                    "elemento_creado" => $mantenimiento
                ]
            ,200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mantenimiento = Mantenimiento::find($id)->load('servicio')->load('departamento')->load('user');

        if(is_object($mantenimiento)){
            return Response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "elemento" => $mantenimiento,
                ]
            , 200); 
        }else{
            return Response()->json(
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
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $mantenimiento->update($request->all());

        if(!$mantenimiento){
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
                    'elemento_actualizado' => $mantenimiento
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();

        if(empty($mantenimiento)){
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
                    "elemento_borrado" => $mantenimiento
                ],200);

        }
    }

    public function getAntiguos()
    {
        $mantenimientos = mantenimiento::orderBy('fecha', 'asc')->paginate(10);

        if($mantenimientos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $mantenimientos
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
       
        $mantenimientos = Mantenimiento::whereBetween('fecha', [$date_start, $date_end])->orderBy('fecha', 'desc')->paginate(10);


        if($mantenimientos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $mantenimientos
            ], 200);

        }else{
            return response()->json(
                $data = [
                    "code" => 200,
                    "status" => "error",
                    "message" => "la solciitud ha fallado"
                ], 200);
        }


    }

    public function everyMonth($inicio, $final)
    {
        $date_start = date($inicio);
        $date_end = date($final);
       
        $mantenimientos = Mantenimiento::whereBetween('fecha', [$date_start, $date_end])->orderBy('fecha', 'desc')->paginate(10);


        if($mantenimientos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $mantenimientos
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
        $mantenimientos = Mantenimiento::where('status', 'pendiente')->orderBy('fecha', 'desc')->paginate(10);


        if($mantenimientos){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $mantenimientos
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

    public function byUser($id)
    {
        $mantenimientos = Mantenimiento::where('usuario_id', $id)->orderBy('fecha', 'desc')->paginate(10);

        if(is_object($mantenimientos)){
            return Response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "elemento" => $mantenimientos,
                ]
            , 200); 
        }else{
            return Response()->json(
                $data = [
                    'message' => 'lo siento!, algo ha salido mal',
                    'code' => '404',
                    'status' => 'error'
                ]
            , 404);

        }
    }
}
