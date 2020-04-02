<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\bcrypt;


class UserController extends Controller
{

  public function index(){
    $users = User::all(); 

    return response()->json([
      'status' => 'success',
      'code' => 200,
      'message' => 'listado de todos los usuarios',
      'usuarios' => $users
    ], 200);
  }

	public function register(request $request){
		$registro = $request->all();

		$validate  = \Validator::make($registro, [
            'name'          =>'required',
            'surname'       =>'required',
            'email'         =>'required|email|unique:users',
            'password'      =>'required',
            'control_number'  =>'required|unique:users',
            'repeat_password' =>'required|same:password'

          ]);

		if($validate->fails()){
			return response()->json([
				'status' => 'error',
				'code' => 404,
				'message' => 'perdon, tus datos parecen no ser correctos o las contrasenas no coinciden'
			]);
		}else{
				$registro['password'] = bcrypt($registro['password']);
        

				$user = User::create($registro);
        

				return response()->json([
					'status' => 'success',
					'code' => 200,
					'message' => 'parece que tenemos un usuario nuevo',
					'usuario' => $user
				]);


			}

		}	


	public function login(){
		$datos = [
			'email' => request('email'),
			'password' => request('password')
		];

		if(Auth::attempt($datos)){
			$user = Auth::user();
      $usuario = User::where('email', $datos['email'])->first();

			$loginData['token'] = $user->createToken('mitoken')->accessToken;
     
			return response()->json(
        $data = [
  				'status' => 'success',
  				'code' => 200,
  				'message' => 'parece que nos volvemos a encontrar',
          'usuario' => $usuario,
  				'acceso' => $loginData
  			], 200);
		}else{
			return response()->json([
				'status' => 'error',
				'code' => 404,
				'message' => 'parece que algo malo ha ocurrido'
			]);
		}
		
	}

	public function update(Request $request, $id){

		$user = User::where('id', $id);
    $user_actualizado = $user->update($request->all());

        if(!$user_actualizado){
            return response()->json([
                    'message' => 'lo siento!, algo ha salido mal',
                    'code' => '404',
                    'status' => 'error'
                ]

            , 404);

        }else{
            return response()->json([
                    'message' => 'todo ha salido bien, el usuario se ha actualizado',
                    'code' => '200',
                    'status' => 'success'
                ]
            ,200);

        }

	}

	public function delete($id){
    $user = User::where('id', $id);
		$user_borrado = $user->delete();

        if(!$user_borrado){
            return response()->json([
                    "message" => "lo siento!, algo ha salido mal",
                    "code" => 404,
                    "status" => "error"
                ], 404);

        }else{
            return response()->json([
                    "message" => "todo ha salido bien, el usuario se ha borrado bien",
                    "code" => 200,
                    "status" => "success"
                ],200);

        }

	}

	public function upload(Request $request){

      //recoger datos de la peticion
      $image = $request->file('file0');

      //validar imagen
      $validate = \Validator::make($request->all(), [
        'file0' => 'required|image|mimes:jpg,jpeg,png,gif'
      ]);

      //guardar imagen
      if(!$image || $validate->fails()){

        $data = array(
          'code' => 400,
          'status' => 'error',
          'message' => 'Error al subir la imagen'
        );


      }else{

        $image_name = time().$image->getClientOriginalName();
        \Storage::disk('users')->put($image_name, \File::get($image));

        $data = array(
          'code' => 200,
          'status' => 'success',
          'image' => $image_name
        );
      }


        return response()->json($data, $data['code']);

    }

    public function getImage($filename){

      $isset = \Storage::disk('users')->exists($filename);

      if($isset){

        $file = \Storage::disk('users')->get($filename);
        return new Response($file, 200);

      }else{

        $data = array(
          'code' => 404,
          'status' => 'error',
          'message' => 'la imagen no existe'

        );

        return response()->json($data, $data['error']);
    	}

	}

    public function detail($id){

	    $user = User::find($id);

	      if(is_object($user)){
	        $data = array(
	          'code' => 200,
	          'status' => 'success',
	          'user' => $user

	        );
	      }else{

	        $data = array(
	          'code' => 404,
	          'status' => 'error',
	          'message' => 'el usuario no existe'

	        );

	      }

      return response()->json($data, $data['code']);
    }


}