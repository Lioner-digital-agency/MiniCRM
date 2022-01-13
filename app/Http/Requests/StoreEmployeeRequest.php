<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:55',
            'last_name' => 'required|max:55',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|min:11',
            'company_id' => 'nullable|exists:companies,id'
        ];
    }
}
