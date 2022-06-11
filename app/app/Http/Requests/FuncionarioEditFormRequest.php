<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioEditFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'matricula' => 'required|unique:funcionarios,matricula,'. $this->id,
            'cargo' => 'required',
            'rg' => 'required',
            'cpf' => 'required|unique:funcionarios,cpf,'. $this->id,
        ];
    }
}
