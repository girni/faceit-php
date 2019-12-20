<?php

namespace Girni\Faceit\Model;

use Girni\Faceit\Parser\PlayerMatchParser;

final class PlayerMatch
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var bool
     */
    public bool $won;

    /**
     * @var int
     */
    public int $kills;

    /**
     * @var int
     */
    public int $assists;

    /**
     * @var int
     */
    public int $deaths;

    /**
     * @var float
     */
    public float $krRatio;

    /**
     * @var float
     */
    public float $kdRatio;

    /**
     * @var int
     */
    public int $hsPercent;

    /**
     * @var int
     */
    public int $headshots;

    /**
     * @var string
     */
    public string $map;

    /**
     * @var string
     */
    public string $score;

    /**
     * @var int
     */
    public int $elo;

    /**
     * @var string
     */
    public string $teamName;

    /**
     * @var string
     */
    public string $region;

    /**
     * @var string
     */
    public string $status;

    /**
     * @var string
     */
    public string $game;

    /**
     * @var string
     */
    public string $gameMode;

    /**
     * @var string
     */
    public string $date;

    /**
     * Match constructor.
     * @param string $id
     * @param bool $won
     * @param int $kills
     * @param int $assists
     * @param int $deaths
     * @param float $krRatio
     * @param float $kdRatio
     * @param int $hsPercent
     * @param int $headshots
     * @param string $map
     * @param string $score
     * @param int $elo
     * @param string $teamName
     * @param string $region
     * @param string $status
     * @param string $game
     * @param string $gameMode
     * @param string $date
     */
    public function __construct(
        string $id,
        bool $won,
        int $kills,
        int $assists,
        int $deaths,
        float $krRatio,
        float $kdRatio,
        int $hsPercent,
        int $headshots,
        string $map,
        string $score,
        int $elo,
        string $teamName,
        string $region,
        string $status,
        string $game,
        string $gameMode,
        string $date
    )
    {
        $this->id = $id;
        $this->won = $won;
        $this->kills = $kills;
        $this->assists = $assists;
        $this->deaths = $deaths;
        $this->krRatio = $krRatio;
        $this->kdRatio = $kdRatio;
        $this->hsPercent = $hsPercent;
        $this->headshots = $headshots;
        $this->map = $map;
        $this->score = $score;
        $this->elo = $elo;
        $this->teamName = $teamName;
        $this->region = $region;
        $this->status = $status;
        $this->game = $game;
        $this->gameMode = $gameMode;
        $this->date = $date;
    }

    /**
     * @param PlayerMatchParser $parser
     * @return PlayerMatch
     */
    public static function fromParser(PlayerMatchParser $parser): PlayerMatch
    {
        return new self(
            $parser->getMatchId(),
            $parser->won(),
            $parser->getKills(),
            $parser->getAssists(),
            $parser->getDeaths(),
            $parser->getKrRatio(),
            $parser->getKdRatio(),
            $parser->getHsPercent(),
            $parser->getHeadshots(),
            $parser->getMap(),
            $parser->getScore(),
            $parser->getElo(),
            $parser->getTeamName(),
            $parser->getRegion(),
            $parser->getStatus(),
            $parser->getGame(),
            $parser->getGameMode(),
            $parser->getDate()
        );
    }
}