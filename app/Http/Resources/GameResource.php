<?php

namespace App\Http\Resources;

use App\Game;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /**
         * @var $this Game
         */

        return [
            'id' => $this->getId(),
            'isWin' => $this->isWin(),
            'date' => $this->getCreatedAt(),
            'gameType' => $this->getGameType(),
            'answerTitle' => $this->getAnswer()->getTitle(),
            'answerSource' => $this->getAnswer()->getSource(),
            'gameSource' => $this->getSource()->getSource()
        ];
    }
}
