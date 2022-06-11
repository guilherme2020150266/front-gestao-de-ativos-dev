<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoFormRequest extends FormRequest
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
            'modelo' => 'required',
            'fabricante' => 'required',
            'numero_patrimonio' => 'required',
            'tipo_equipamento_id' => 'required',
        ];
    }
}
