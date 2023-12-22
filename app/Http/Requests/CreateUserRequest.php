<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Services\EncryptionService;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public $referrer;

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
        $this->referrer = User::find($decryptedId);
        $existingUser = User::where('phone', $this->phone)->first();
        if ($existingUser && $existingUser->referrer_id == $this->referrer->id) {
            $this->merge(['already_referred' => true]);
        }
        $this->merge(['referrer_id' => $decryptedId]);

        // $url = url()->previous();
        // $route = app('router')->getRoutes()->match(app('request')->create($url));
        // $routeParameterId = array_key_exists('hashed_id', $route->parameters) ? $es->decrypt($route->parameters['hashed_id']) : null;
        // $this->merge(['url_parameter_id' => $routeParameterId]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'surname' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'password' => ['sometimes', 'required'],
            'password_confirmation' => ['sometimes', 'required', 'same:password'],
            'city' => ['nullable'],
            'province' => ['nullable'],
            'region' => ['nullable'],
            'crm_status' => ['nullable'],
            'crm_id' => ['nullable'],
            'crm_sync_errors' => ['nullable'],
            'crm_synced_at' => ['nullable'],
            'referrer_id' => ['nullable'],
            'already_referred' => ['sometimes', 'declined'],
            'city_id' => ['sometimes', 'required'],
        ];
        // 'url_parameter_id' => ['same:referrer_id'],
    }

    public function messages(): array
    {
        return [
            'password_confirmation.same' => 'Le password non corrispondono',
            'already_referred.declined' => 'Sei già stato referenziato da '.$this->referrer->name.' '.$this->referrer->surname,
            // 'url_parameter_id.same' => 'Woops, C\'è un problema con il tuo link. Riprova più tardi',
        ];
    }
}
