<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Comment;

class CommentRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'text' => 'required|string'
        ];
    }

    protected function failedValidation(Validator $validator) {
      throw new HttpResponseException(response()->json($validator->errors(),
      422));
    }
}
