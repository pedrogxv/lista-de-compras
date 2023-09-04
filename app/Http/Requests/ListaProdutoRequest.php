<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListaProdutoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'produto' => ['required', 'string'],
            'quantidade' => ['required', 'integer'],
            'unidade' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
