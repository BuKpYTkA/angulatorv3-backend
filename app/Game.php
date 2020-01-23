<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Game
 * @package App
 * @property int $id
 * @property string $game_type
 * @property bool|null $is_win
 * @property int $answer_id
 * @property int $user_id
 * @property int $game_source_id
 * @property string $created_at
 * @property Answer $answer
 * @property GameSource $source
 */
class Game extends Model
{

    protected $fillable = [
        'game_type',
        'is_win',
        'answer_id',
        'user_id',
        'game_source_id',
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
    public function getGameType(): string
    {
        return $this->game_type;
    }

    /**
     * @param string $gameType
     */
    public function setGameType(string $gameType): void
    {
        $this->game_type = $gameType;
    }

    /**
     * @return bool|null
     */
    public function isWin()
    {
        return $this->is_win;
    }

    /**
     * @param bool|null $isWin
     */
    public function setIsWin(bool $isWin = null)
    {
        $this->is_win = $isWin;
    }

    /**
     * @return int
     */
    public function getAnswerId(): int
    {
        return $this->answer_id;
    }

    /**
     * @param int $answerId
     */
    public function setAnswerId(int $answerId): void
    {
        $this->answer_id = $answerId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    /**
     * @return int
     */
    public function getGameSourceId(): int
    {
        return $this->game_source_id;
    }

    /**
     * @param int $gameSourceId
     */
    public function setGameSourceId(int $gameSourceId): void
    {
        $this->game_source_id = $gameSourceId;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function source()
    {
        return $this->belongsTo(GameSource::class, 'game_source_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @return GameSource
     */
    public function getSource()
    {
        return $this->source;
    }

}
