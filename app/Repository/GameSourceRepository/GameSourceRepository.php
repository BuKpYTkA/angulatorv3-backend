<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.01.2020
 * Time: 11:58
 */

namespace App\Repository\GameSourceRepository;

use App\GameSource;

/**
 * Class GameSourceRepository
 * @package App\Repository\GameSourceRepository
 */
class GameSourceRepository
{

    /**
     * @param string $source
     * @param string $sourceType
     * @return \Illuminate\Database\Eloquent\Builder|GameSource
     */
    public function create(string $source, string $sourceType)
    {
        return GameSource::query()->create([
            'source' => $source,
            'source_type' => $sourceType
        ]);
    }
}