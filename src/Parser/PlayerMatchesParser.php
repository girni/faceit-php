<?php

namespace Girni\Faceit\Parser;

use Girni\Faceit\Model\PlayerMatches;

final class PlayerMatchesParser implements ParserInterface
{
    /**
     * @var array
     */
    private array $data;

    /**
     * PlayerMatchesParser constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return PlayerMatches
     */
    public function getModel()
    {
        return PlayerMatches::fromParser($this);
    }

    /**
     * @return array
     */
    public function getMatches(): array
    {
        $collection = [];

        foreach($this->data as $key => $match) {
            $collection[] = (new PlayerMatchParser(
                $match,
                $this->calculateEloGain($match, $this->data[$key + 1])
            ))->getModel();
        }

        return $collection;
    }

    /**
     * @param array $currentMatch
     * @param array|null $previousMatch
     * @return int|null
     */
    private function calculateEloGain(array $currentMatch, ?array $previousMatch = null): ?int
    {
        if($previousMatch === null || !isset($previousMatch['elo'])) {
            return null;
        }

        $previousMatchElo = $this->convertEloToInt($previousMatch['elo']);
        $currentMatchElo = $this->convertEloToInt($currentMatch['elo']);

        return $currentMatchElo - $previousMatchElo;
    }

    /**
     * @param string $elo
     * @return int
     */
    private function convertEloToInt(string $elo): int
    {
        return (int) str_replace(',', '', $elo);
    }
}