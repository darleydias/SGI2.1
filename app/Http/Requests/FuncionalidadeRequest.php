<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionalidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255|unique:funcionalidade,nome',
            'URL' => 'required|min:5|max:255|unique:funcionalidade,URL',
            'menu'=>'required|numeric',
            'sistema_id' => 'required|numeric',
        ];
    }


/**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'nome.max' => 'O campo nome não pode ter mais que :max caracteres.',
            'URL.required' => 'O campo URL é obrigatório.',
            'URL.min' => 'O campo URL deve ter pelo menos :min caracteres.',
            'URL.max' => 'O campo URL não pode ter mais que :max caracteres.',
        ];
    }
}