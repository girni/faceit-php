<?php


namespace Girni\Faceit\Request\Player;

use Girni\Faceit\Config\Url;
use Girni\Faceit\Request\Request;
use Girni\Faceit\Request\RequestInterface;

class PlayerMatchesRequest extends Request implements RequestInterface
{
    /**
     * @var string
     */
    protected string $baseUrl = Url::STATS_API;

    /**
     * @var string
     */
    protected string $baseUri = 'stats/time/users/{player_id}/games/csgo';

    /**
     * @var string
     */
    private string $playerId;

    /**
     * @var int
     */
    private int $limit;

    /**
     * MatchesRequest constructor.
     * @param string $playerId
     * @param int $limit
     */
    public function __construct(string $playerId, int $limit = 30)
    {
        parent::__construct();

        $this->playerId = $playerId;
        $this->limit = $limit;
    }

    public function getUrl(): string
    {
        $this->setUriParam('{player_id}', $this->playerId);
        $this->setQueryParams(['query' => ['size' => $this->limit]]);

        return parent::getUrl();
    }
}