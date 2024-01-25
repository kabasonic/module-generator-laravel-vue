<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'type' => 'required|string',
            'name' => 'string',
            'script.clickout' => 'required|url',
            'styles.width' => 'required|numeric|min:0|max:100',
            'styles.height' => 'required|numeric|min:0|max:100',
            'styles.positionX' => 'required|numeric|min:0',
            'styles.positionY' => 'required|numeric|min:0',
        ];
    }


    public function authorize(): bool
    {
        return true;
    }
}
