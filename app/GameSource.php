<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GameSource
 * @package App
 * @property int $id
 * @property string $source
 * @property string $source_type
 */
class GameSource extends Model
{

    protected $fillable = [
        'source', 'source_type'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getSourceType(): string
    {
        return $this->source_type;
    }

    /**
     * @param string $sourceType
     */
    public function setSourceType(string $sourceType): void
    {
        $this->source_type = $sourceType;
    }

}
