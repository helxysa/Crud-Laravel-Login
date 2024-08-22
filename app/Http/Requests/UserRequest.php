<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

 protected function  failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors(),

        ], 422));
 }

    public function rules(): array
    {
        $this->route('user');    
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6' 
        ];
    }


    public function messages(): array
    {
        return [
                'name.required' => "Campo nome é obrigatório",
                'email.required' => "Campo email é obrigatório",
                'email.email' => "Necessário enviar email válido",
                'name.unique' => "O email já está cadastrado",
                'password.required' => "Campo senha é obrigatório",
                'password.min' => "Senha com no minimo 6 caracteres",
                
        ];
    } 
}