<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LojaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome_loja' => 'required|max:40|min:3',
            'email'     => "required|email|unique:lojas,email"
        ];
    }

    public function messages(): array
    {
        return [
            'nome_loja.required'    => 'Nome da loja é obrigatório',
            'nome_loja.max'         => 'Nome da loja só pode ter no máximo 40 caracteres',
            'nome_loja.min'         => 'Nome da loja só pode ter no minimo 3 caracteres',
            'email.required'        => 'E-mail é obrigatório',
            'email.email'           => 'E-mail inválido',
            'email.unique'          => 'O e-mail já está cadastrado',
        ];
    }
}
