<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest {
    protected function prepareForValidation() {
    }

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            "title" => "required",
            "price" => "required"
        ];
    }

    public function messages() {
        return [
            "title.required" => "Заполните название",
            "price.required" => "Заполните цену"
        ];
    }
}
