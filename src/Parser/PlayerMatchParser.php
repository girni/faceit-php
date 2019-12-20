<?php

namespace Girni\Faceit\Parser;

use Girni\Faceit\Model\PlayerMatch;

final class PlayerMatchParser implements ParserInterface
{
    const WIN = 'i10';
    const KILLS = 'i6';
    const ASSISTS = 'i7';
    const DEATHS = 'i8';
    const KR_RATIO = 'c3';
    const KD_RATIO = 'c2';
    const HS_PERCENT = 'c4';
    const HEADSHOTS = 'i13';
    const MAP = 'i1';
    const SCORE = 'i18';
    const ELO = 'elo';
    const TEAM_NAME = 'i5';
    const REGION = 'i0';
    const STATUS = 'status';
    const GAME = 'game';
    const GAME_MODE = 'gameMode';
    const DATE = 'date';
    const MATCH_ID = 'matchId';

    /**
     * @var array
     */
    private array $data;

    /**
     * PlayerParser constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return PlayerMatch
     */
    public function getModel(): PlayerMatch
    {
        return PlayerMatch::fromParser($this);
    }

    /**
     * @return mixed
     */
    public function getMatchId(): string
    {
        return $this->data[self::MATCH_ID];
    }

    /**
     * @return bool
     */
    public function won(): bool
    {
        return $this->data[self::WIN] == 1 ? true : false;
    }

    /**
     * @return int
     */
    public function getKills(): int
    {
        return $this->data[self::KILLS];
    }

    /**
     * @return int
     */
    public function getAssists(): int
    {
        return $this->data[self::ASSISTS];
    }

    /**
     * @return int
     */
    public function getDeaths(): int
    {
        return $this->data[self::DEATHS];
    }

    /**
     * @return float
     */
    public function getKrRatio(): float
    {
        return $this->data[self::KR_RATIO];
    }

    /**
     * @return float
     */
    public function getKdRatio(): float
    {
        return $this->data[self::KD_RATIO];
    }

    /**
     * @return int
     */
    public function getHsPercent(): int
    {
        return $this->data[self::HS_PERCENT];
    }

    /**
     * @return int
     */
    public function getHeadshots(): int
    {
        return $this->data[self::HEADSHOTS];
    }

    /**
     * @return string
     */
    public function getMap(): string
    {
        return $this->data[self::MAP];
    }

    /**
     * @return string
     */
    public function getScore(): string
    {
        return $this->data[self::SCORE];
    }

    /**
     * @return int|null
     */
    public function getElo(): ?int
    {
        if(!isset($this->data[self::ELO])) {
            return null;
        }

        return (int) str_replace(',', '', $this->data[self::ELO]);
    }

    /**
     * @return string
     */
    public function getTeamName(): string
    {
        return $this->data[self::TEAM_NAME];
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->data[self::REGION];
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->data[self::STATUS];
    }

    /**
     * @return string
     */
    public function getGame(): string
    {
        return $this->data[self::GAME];
    }

    /**
     * @return string
     */
    public function getGameMode(): string
    {
        return $this->data[self::GAME_MODE];
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->data[self::DATE];
    }
}