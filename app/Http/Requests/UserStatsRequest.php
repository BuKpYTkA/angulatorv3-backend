<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserStatsRequest
 * @package App\Http\Requests
 */
class UserStatsRequest extends FormRequest
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
            'email' => 'required|string|email'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Invalid email format',
            'email.string' => 'Email should be a string',
            'email.required' => 'Email field is required'
        ];
    }

    /**
     * @param Validator $validator
     * @throws \Exception
     */
    protected function failedValidation(Validator $validator)
    {
        throw new \Exception($validator->errors());
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->input('email');
    }

}
