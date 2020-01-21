<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 * @package App
 * @property int $id
 * @property string|null $title
 * @property string|null $source
 */
class Answer extends Model
{

    protected $fillable = [
        'title', 'source'
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param null|string $source
     */
    public function setSource(?string $source): void
    {
        $this->source = $source;
    }

}
