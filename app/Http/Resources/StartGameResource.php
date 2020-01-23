<?php

namespace App\Http\Resources;

use App\Services\GameService\DTO\GameDTOInterface;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class StartGameResource
 * @package App\Http\Resources
 */
class StartGameResource extends JsonResource
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
         * @var $this GameDTOInterface
         */
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'source' => $this->getSource()
        ];
    }
}
