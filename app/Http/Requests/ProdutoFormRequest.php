<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
            'nome'  => 'required|string|max:60|min:3',
            'valor' => 'required|numeric|max:999999|min:2',
            'ativo' => 'required|boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'         => 'Nome do produto é obrigatório',
            'nome.string'           => 'Nome do produto inválido',
            'nome.max'              => 'Nome do produto tem que ter no máximo 60 caracteres',
            'nome.min'              => 'Nome do produto tem que ter no minimo 3 caracteres',
            'valor.required'        => 'Valor é obrigatório',
            'valor.numeric'         => 'Valor inválido',
            'valor.min'             => 'Valor tem que ter no máximo 2 digitos',
            'valor.max'             => 'Valor tem que ter no máximo 6 digitos',
            'ativo.required'        => 'Ativo é obrigatório',
            'ativo.boolean'         => 'Ativo inválido',
        ];
    }
}
