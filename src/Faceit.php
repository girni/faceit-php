<?php

namespace Girni\Faceit;

use Girni\Faceit\Api\Client;
use Girni\Faceit\Api\ClientInterface;
use Girni\Faceit\Model\Player;
use Girni\Faceit\Model\PlayerMatches;
use Girni\Faceit\Model\PlayerStats;
use Girni\Faceit\Parser\PlayerMatchesParser;
use Girni\Faceit\Parser\PlayerParser;
use Girni\Faceit\Parser\PlayerStatsParser;
use Girni\Faceit\Request\Player\PlayerMatchesRequest;
use Girni\Faceit\Request\Player\PlayerByNicknameRequest;
use Girni\Faceit\Request\Player\PlayerStatsRequest;
use Girni\Faceit\Exception\FaceitApiConnectionException;
use Girni\Faceit\Exception\InvalidResponseException;
use GuzzleHttp\Exception\GuzzleException;

final class Faceit extends Client implements ClientInterface
{
    /**
     * @param string $nickname
     * @return Player
     * @throws FaceitApiConnectionException
     * @throws GuzzleException
     * @throws InvalidResponseException
     */
    public function getPlayerByNickname(string $nickname): Player
    {
        $response = $this->request(new PlayerByNicknameRequest($nickname));
        $parser = new PlayerParser($response->getData());

        return $parser->getModel();
    }

    /**
     * @param string $playerId
     * @return PlayerStats
     * @throws FaceitApiConnectionException
     * @throws GuzzleException
     * @throws InvalidResponseException
     */
    public function getPlayerStats(string $playerId): PlayerStats
    {
        $response = $this->request(new PlayerStatsRequest($playerId));
        $parser = new PlayerStatsParser($response->getData());

        return $parser->getModel();
    }

    /**
     * @param string $playerId
     * @param int $limit
     * @return PlayerMatches
     * @throws FaceitApiConnectionException
     * @throws GuzzleException
     * @throws InvalidResponseException
     */
    public function getMatches(string $playerId, int $limit = 30): PlayerMatches
    {
        $response = $this->request(new PlayerMatchesRequest($playerId, $limit), false);
        $parser = new PlayerMatchesParser($response->getData());

        return $parser->getModel();
    }
}