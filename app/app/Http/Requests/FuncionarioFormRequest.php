<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioFormRequest extends FormRequest
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
    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpf' => unMask($this->cpf),
        ]);
    }

    public function rules()
    {
        return [
            'nome' => 'required',
            'matricula' => 'required|unique:funcionarios',
            'cargo' => 'required',
            'rg' => 'required',
            'cpf' => 'required|unique:funcionarios',
        ];
    }
}
