<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:255'],
            'company_vat' => ['required', 'numeric', 'unique:clients,company_vat,'.$this->client->id],
            'company_address' => ['required'],
            'company_city' => ['required', 'string'],
            'company_zip' => ['required'],
            'logo' => ['mimes:jpeg,png'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'string', 'max:255', 'unique:clients,contact_email,'.$this->client->id],
            'contact_phone_number' => ['required', 'string']
        ];
    }
}
