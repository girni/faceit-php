<?php

namespace Girni\Faceit\Request\Player;

use Girni\Faceit\Config\Url;
use Girni\Faceit\Request\Request;
use Girni\Faceit\Request\RequestInterface;

final class PlayerStatsRequest extends Request implements RequestInterface
{
    /**
     * @var string
     */
    protected string $baseUrl = Url::DATA_API;

    /**
     * @var string
     */
    protected string $baseUri = 'players/{playerId}/stats/csgo';

    /**
     * @var string
     */
    private string $playerId;

    public function __construct(string $playerId)
    {
        parent::__construct();

        $this->playerId = $playerId;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        $this->setUriParam('{playerId}', $this->playerId);

        return parent::getUrl();
    }
}