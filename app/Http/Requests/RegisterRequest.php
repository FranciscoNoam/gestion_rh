<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email:rfc,dns|unique:users,email',
            'identifiant' => 'required|unique:users,identifiant',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
