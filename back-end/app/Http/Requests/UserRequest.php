<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    //validation rules
    public function rules() {
        return [
          'name' => 'required|string',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:8',
        ];
    }

    //custom error messages
    public function messages() {
        return [
          'email.email' =>'Insira um email válido',
          'email.unique' =>'Este email já existe'
        ];
    }

    protected function failedValidation(Validator $validator) {
      throw new HttpResponseException(response()->json($validator->errors(),
      422));
    }
}
