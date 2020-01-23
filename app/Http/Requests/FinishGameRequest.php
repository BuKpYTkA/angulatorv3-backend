<?php

namespace App\Http\Requests;

use App\Game;
use Illuminate\Foundation\Http\FormRequest;

class FinishGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $game = Game::query()->find($this->input('id'));
        return (bool)$game;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'numeric|required',
            'isWin' => 'bool|required'
        ];
    }

    /**
     * @throws \Exception
     */
    protected function failedAuthorization()
    {
        throw new \Exception('Unauthorized action');
    }

    /**
     * @return int
     */
    public function getGameId()
    {
        return $this->input('id');
    }

    /**
     * @return bool
     */
    public function isWin()
    {
        return $this->input('isWin');
    }
}
