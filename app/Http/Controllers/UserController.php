<?php


use App\User;
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UserController
{

	public function register(	request $request){
		$registro = $request->all();

		$registro['password'] = bcrypt($registro['password']);

		$user = User::create($registro);

	}


	public function login(){
		$datos = [
			'email' => request('email'),
			'password' => request('password')
		];

		if(Auth::attempt($datos)){
			$user = Auth::user();

			$loginData['token'] = $user->createToken('mitoken')->accessToken;

			return response()->json([
				'status' => 'success',
				'code' => 200,
				'message' => 'parece que nos volvemos a encontrar'.
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
}