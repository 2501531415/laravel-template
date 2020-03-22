<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Contracts\Validation\Validator;

class RequestController extends FormRequest{

        protected function failedValidation(Validator $validator){

              $error= $validator->errors()->all();

              throw new HttpResponseException(response()->json(['code'=>422,'message'=>$error[0]]));

    }

}