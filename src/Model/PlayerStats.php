<?php

namespace Girni\Faceit\Model;

use Girni\Faceit\Parser\PlayerStatsParser;

final class PlayerStats
{
    /**
     * @var array
     */
    public array $lifetimeStats;

    /**
     * @var int
     */
    public int $averageHsRatio;

    /**
     * @var float
     */
    public float $averageKdRatio;

    /**
     * @var float
     */
    public float $winRate;

    /**
     * @var int
     */
    public int $wins;

    /**
     * @var array
     */
    public array $recentResults;

    /**
     * @var int
     */
    public int $currentWinStreak;

    /**
     * @var int
     */
    public int $longestWinStreak;

    /**
     * @var int
     */
    public int $matches;

    /**
     * @var array
     */
    public array $maps;

    /**
     * PlayerStats constructor.
     * @param array $lifetimeStats
     * @param float $averageHsRatio
     * @param float $averageKdRatio
     * @param float $winRate
     * @param int $wins
     * @param array $recentResults
     * @param int $currentWinStreak
     * @param int $longestWinStreak
     * @param int $matches
     * @param array $maps
     */
    public function __construct(
        array $lifetimeStats,
        float $averageHsRatio,
        float $averageKdRatio,
        float $winRate,
        int $wins,
        array $recentResults,
        int $currentWinStreak,
        int $longestWinStreak,
        int $matches,
        array $maps
    )
    {
        $this->lifetimeStats = $lifetimeStats;
        $this->averageHsRatio = $averageHsRatio;
        $this->averageKdRatio = $averageKdRatio;
        $this->winRate = $winRate;
        $this->wins = $wins;
        $this->recentResults = $recentResults;
        $this->currentWinStreak = $currentWinStreak;
        $this->longestWinStreak = $longestWinStreak;
        $this->matches = $matches;
        $this->maps = $maps;
    }

    /**
     * @param PlayerStatsParser $parser
     * @return PlayerStats
     */
    public static function fromParser(PlayerStatsParser $parser): PlayerStats
    {
        return new self(
            $parser->getLifetimeStats(),
            $parser->getAverageHsRatio(),
            $parser->getAverageKdRatio(),
            $parser->getWinRate(),
            $parser->getWins(),
            $parser->getRecentResults(),
            $parser->getCurrentWinStreak(),
            $parser->getLongestWinStreak(),
            $parser->getMatches(),
            $parser->getMaps()
        );
    }
}