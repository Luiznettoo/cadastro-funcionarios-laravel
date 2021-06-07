<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'name'=>'required',
            'email'=>'required',
            'office'=>'required',
            'address'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Coloque o Nome do Funcionário!',
            'email.required' => 'Coloque o Email do Funcionário!',
            'office.required' => 'Coloque o Cargo do Funcionário!',
            'address.required' => 'Coloque o Endereço do Funcionário!',
        ];
    }
}
