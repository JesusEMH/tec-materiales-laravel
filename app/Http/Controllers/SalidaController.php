<?php

namespace App\Http\Controllers;

use App\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salida::orderBy('fecha', 'desc')->paginate(10);

        return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $salidas
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
        $creado = Salida::create($request->all());
        $salida = Salida::find($creado['id']);

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
                        "elemento_creado" => $salida
                    ]
                ,200);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Salida::find($id)->load('vehiculo')->load('departamento')->load('user');



        if(is_object($salida)){
            return Response()->json(
                $data = [
                        "message" => "todo ha salido bien",
                         "code" => "200",
                        "status" => "success",
                        "elemento" => $salida,
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
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        $salida->update($request->all());

        if(!$salida){
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
                    'elemento_actualizado' => $salida
                ]
            ,200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        $salida->delete();

        if(empty($salida)){
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
                    "elemento_borrado" => $salida
                ],200);

        }
    }

    public function getAntiguos()
    {
        $salidas = Salida::orderBy('fecha', 'asc')->paginate(10);

        if($salidas){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $salidas
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
       
        $salidas = Salida::whereBetween('fecha', [$date_start, $date_end])->orderBy('fecha', 'desc')->paginate(10);


        if($salidas){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $salidas
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

    public function getPorStatus()
    {
        $salidas = Salida::where('status', 'pendiente')->orderBy('fecha', 'desc')->paginate(10);


        if($salidas){
            return response()->json(
            $data = [
                "code" => 200,
                "status" => "success",
                "elementos" => $salidas
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
        $salidas = Salida::where('usuario_id', $id)->paginate(10);

        if(is_object($salidas)){
            return Response()->json(
                $data = [
                    "message" => "todo ha salido bien",
                     "code" => "200",
                    "status" => "success",
                    "elemento" => $salidas,
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
