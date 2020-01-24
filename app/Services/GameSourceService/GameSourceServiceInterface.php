<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 23.01.2020
 * Time: 18:32
 */

namespace App\Services\GameSourceService;


/**
 * Class GameSourceService
 * @package App\Services\GameSourceService
 */
interface GameSourceServiceInterface
{
    /**
     * @param string $source
     * @param string $gameType
     * @return \App\GameSource|\Illuminate\Database\Eloquent\Builder
     */
    public function create(string $source, string $gameType);
}