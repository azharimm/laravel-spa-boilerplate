<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\{RegisterFormRequest, LoginFormRequest};
use Tymon\JWTAuth\Exceptions\{JWTException};
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use App\User;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
    	$this->auth = $auth;
    }

    public function login(LoginFormRequest $request)
    {
    	try{
    		if(!$token = $this->auth->attempt($request->only('email','password'))){
    			return response()->json([
    				'errors'=>[
    					'root'=>'Could not sign you in with those details.'
    				]
    			],401);
    		}
    	}catch(JWTException $e){
    		return response()->json([
    			'errors'=>[
    				'root'=>'Failed'
    			]
    		], 500);
    	}

    	return response()->json([
    		'data'=>$request->user(),
    		'meta'=>[
    			'token'=>$token
    		]
    	],200);
    }

    public function register(RegisterFormRequest $request)
    {
    	$user = User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=> bcrypt($request->password)
    	]);

    	//attempt auth
    	$token = $this->auth->attempt($request->only('email','password'));
    	//response with jwt
    	return response()->json([
    		'data'=>$user,
    		'meta'=>[
    			'token'=>$token
    		]
    	],200);
    }	

    public function logout()
    {
    	$this->auth->invalidate($this->auth->getToken());

    	return response(null, 200);
    }

    public function user(Request $request)
    {
    	return response()->json([
    		'data'=>$request->user()
    	]);
    }
}
