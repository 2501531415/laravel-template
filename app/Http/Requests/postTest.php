<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class postTest extends RequestController
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'username' => ['required','min:5'],
            'password' => ['required','min:5'],
            'captcha' => ['required','captcha'],
            'key' => 'required',
            'captcha' => 'required|captcha_api:' . $request->input('key')
        ];
    }
    public function messages(){
        return [
            'username.required' => '账号不存在',
            'username.min' => '账号长度不小于5个字符串',
            'password.required' => '密码不存在',
            'password.min' => '密码长度不小于5个字符串',
            'captcha.required' => '验证码不能为空',
            'captcha.captcha_api' => '验证码错误',    
        ];
    }
}
