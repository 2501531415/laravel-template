<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\postTest;
use DB;

class AuthController extends ResponseController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 指定看守器
        $this->middleware('auth:admin', ['except' => ['login','url']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // 登录
    public function login(postTest $request)
    {
        $credentials = request(['username', 'password']);
        $token = auth::guard('admin')->attempt($credentials);
        if(!$token){
            return response()->json(['error'=>'账号或密码不正确']);
        }
        return $this->respondWithToken($token);
    }

    // 获取当前用户信息
    public function me(){
        return auth::user();
    }
    // 验证码url
    public function url(){
        return response()->json([
            'status_code' => '200',
            'message' => 'created succeed',
            'url' => app('captcha')->create('default', true)
        ]);
    }
}
