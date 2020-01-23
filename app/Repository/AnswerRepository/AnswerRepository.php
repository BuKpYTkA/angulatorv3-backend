<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 12:05
 */

namespace App\Repository\AnswerRepository;

use App\Answer;
use App\Services\DeezerService\DeezerApiClient\DTO\DeezerResultDTOInterface;

/**
 * Class AnswerRepository
 * @package App\Repository\AnswerRepository
 */
class AnswerRepository
{

    /**
     * @param DeezerResultDTOInterface $deezerResultDTO
     * @return \Illuminate\Database\Eloquent\Builder|Answer
     */
    public function create(DeezerResultDTOInterface $deezerResultDTO)
    {
        $title = null;
        if ($deezerResultDTO->getArtist() && $deezerResultDTO->getTitle()) {
            $title = $deezerResultDTO->getArtist() . ' - ' . $deezerResultDTO->getTitle();
        }
        return Answer::query()->create([
            'title' => $title,
            'source' => $deezerResultDTO->getPreview()
        ]);
    }
}