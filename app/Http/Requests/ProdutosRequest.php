<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'O campo Nome não pode estár vázio.',
            'descricao.required' => 'O campo Descrição não pode estár vázio.',
            'descricao.max' => 'O campo Descrição não pode ter mais de 255 caracteres.',
            'valor.required' => 'O campo Valor não pode estár vázio.',
            'valor.numeric' => 'Por favor insira um valor numerico.'
        ];
    }
}
