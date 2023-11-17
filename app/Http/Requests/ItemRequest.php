<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
