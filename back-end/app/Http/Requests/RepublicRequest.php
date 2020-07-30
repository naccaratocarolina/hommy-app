<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Republic;

class RepublicRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
          'title' => 'required|string|max:100',
          'address' => 'required|string',
          'rental_per_month' => 'required|numeric',
          'footage' => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator) {
      throw new HttpResponseException(response()->json($validator->errors(),
      422));
    }
}
