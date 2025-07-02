<?php

namespace App\Http\Requests;

use App\Services\SignUp\DTO\Requests\SignUpRequestDTO;
use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:users,username',
            'phone' => 'required|string|max:255',
        ];
    }

    public function getDTO(): SignUpRequestDTO
    {
        return new SignUpRequestDTO(
            username: $this->input('username'),
            phone: $this->input('phone')
        );
    }
}
