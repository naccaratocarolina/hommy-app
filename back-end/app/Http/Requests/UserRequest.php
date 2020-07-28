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
          'nickname' => 'required|string',
          'email' => 'required|email|unique:users, email',
          'password' => 'required|min:8',
          'phone' => 'min:9|string|telefone',
          'cpf' => 'digits:10|string|formato_cpf|unique:users, cpf'
        ];
    }

    //custom error messages
    public function messages() {
        return [
          'email.email' =>'Insira um email válido',
          'email.unique' =>'Este email já existe',
          'cpf.cpf' => 'O campo não é um CPF válido',
          'cpf.unique' => 'Este cpf ja existe'
        ];
    }

    protected function failedValidation(Validator $validator) {
      throw new HttpResponseException(response()->json($validator->errors(),
      422));
    }
}
