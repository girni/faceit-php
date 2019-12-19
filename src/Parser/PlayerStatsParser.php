<?php

namespace Girni\Faceit\Parser;

use Girni\Faceit\Model\PlayerStats;

final class PlayerStatsParser implements ParserInterface
{
    /**
     * @var array
     */
    private array $data;

    /**
     * PlayerStatsParser constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return PlayerStats
     */
    public function getModel(): PlayerStats
    {
        return PlayerStats::fromParser($this);
    }

    /**
     * @return array
     */
    public function getLifetimeStats(): array
    {
        return $this->data['lifetime'];
    }

    /**
     * @return int
     */
    public function getAverageHsRatio(): int
    {
        return $this->getLifetimeStats()['Average Headshots %'];
    }

    /**
     * @return float
     */
    public function getAverageKdRatio(): float
    {
        return $this->getLifetimeStats()['Average K/D Ratio'];
    }

    /**
     * @return float
     */
    public function getWinRate(): float
    {
        return $this->getLifetimeStats()['Win Rate %'];
    }

    /**
     * @return int
     */
    public function getWins(): int
    {
        return $this->getLifetimeStats()['Wins'];
    }

    /**
     * @return array
     */
    public function getRecentResults(): array
    {
        return $this->getLifetimeStats()['Recent Results'];
    }

    /**
     * @return int
     */
    public function getCurrentWinStreak(): int
    {
        return $this->getLifetimeStats()['Current Win Streak'];
    }

    /**
     * @return int
     */
    public function getLongestWinStreak(): int
    {
        return $this->getLifetimeStats()['Longest Win Streak'];
    }

    /**
     * @return int
     */
    public function getMatches(): int
    {
        return $this->getLifetimeStats()['Matches'];
    }

    /**
     * @return array
     */
    public function getMaps(): array
    {
        return $this->data['segments'];
    }
}