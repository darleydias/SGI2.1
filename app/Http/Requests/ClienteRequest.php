<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
             'nome' => 'required|min:3|max:255|unique:cliente,nome',
             'CNPJ' => 'required|cnpj|unique:cliente,CNPJ',
             'cel' => 'celular_com_ddd',
             'email' => 'email',
             'contato' => '',
             'insEst' => '',
             'insMun' => '',
             'seguimento_id' => 'required',
             'cliente_status'=> '',
        ];
    }
}
