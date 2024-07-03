<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAccountRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'confirmation' => 'required|string|in:sure!delete my account',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'confirmation.in' => "Sorry! You provided an invalid command. Please type 'sure!delete my account' correctlly to delete your account"
        ];
    }
}
