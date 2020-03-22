<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function withOutToken(){
        return response()->json([
            'msg' => 'token不存在或失效',
            'code' => '401'
        ]);
    }
    // 登录成功返回token
    protected function respondWithToken($token)
    {
        return response()->json([
            'code' => '200',
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
