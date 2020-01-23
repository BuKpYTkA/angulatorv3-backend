<?php

namespace App\Http\Requests;

use App\Enum\GameTypeEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GameStartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (in_array($this->input('gameType'), GameTypeEnum::TYPES)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'gameType' => 'required|string',
            'source' => 'required|string'
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
     * @throws \Exception
     */
    public function failedAuthorization()
    {
        throw new \Exception('Invalid game type');
    }

    /**
     * @return string
     */
    public function getGameType()
    {
        return $this->input('gameType');
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->input('source');
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->input('email');
    }
}
