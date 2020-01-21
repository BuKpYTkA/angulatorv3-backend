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
            'email.email' => 'LOH PIDAR',
            'email.string' => 'SUKA EBANA',
            'email.required' => 'IDI NAHOOI'
        ];
    }

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
