<?php

namespace Girni\Faceit\Api;

use Girni\Faceit\Model\Player;
use Girni\Faceit\Model\PlayerMatches;
use Girni\Faceit\Model\PlayerStats;
use Girni\Faceit\Request\RequestInterface;
use Girni\Faceit\Response\ResponseBag;

interface ClientInterface
{
    /**
     * @param RequestInterface $request
     * @return ResponseBag
     */
    public function request(RequestInterface $request): ResponseBag;

    /**
     * @param string $nickname
     * @return Player
     */
    public function getPlayerByNickname(string $nickname): Player;

    /**
     * @param string $playerId
     * @return PlayerStats
     */
    public function getPlayerStats(string $playerId): PlayerStats;

    /**
     * @param string $playerId
     * @param int $limit
     * @return PlayerMatches
     */
    public function getMatches(string $playerId, int $limit = 30): PlayerMatches;
}