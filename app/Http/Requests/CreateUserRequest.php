<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Services\EncryptionService;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $es = new EncryptionService();
        $decryptedId = $es->decrypt($this->hashed_id);
        $this->merge(['referrer_id' => $decryptedId]);
        // $url = 'http://localhost:8000/referee/register/'.$this->hashed_id;
        // dd($url);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|unique:users,phone',
            'password' => 'sometimes|required',
            'password_confirmation' => 'sometimes|required|same:password',
            'city' => 'nullable',
            'province' => 'nullable',
            'region' => 'nullable',
            'referrer_id' => 'nullable',
        ];
    }
}
