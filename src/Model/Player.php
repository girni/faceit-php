<?php

namespace Girni\Faceit\Model;

use Girni\Faceit\Parser\PlayerParser;

final class Player
{
    /**
     * @var string
     */
    public string $id;

    /**
     * @var string
     */
    public string $nickname;

    /**
     * @var string|null
     */
    public ?string $avatar;

    /**
     * @var string
     */
    public string $country;

    /**
     * @var array
     */
    public array $games;

    /**
     * @var array
     */
    public array $game;

    /**
     * @var int
     */
    public int $level;

    /**
     * @var int
     */
    public int $elo;

    /**
     * @var string
     */
    public string $region;

    /**
     * @var string
     */
    public string $steamId64;

    /**
     * @var string
     */
    public string $faceitUrl;

    /**
     * @var string
     */
    public string $newSteamId;

    /**
     * @var string|null
     */
    public ?string $rankingRegion;

    /**
     * @var string|null
     */
    public ?string $rankingCountry;

    /**
     * @var array
     */
    public array $bans;

    /**
     * Player constructor.
     * @param string $id
     * @param string $nickname
     * @param string|null $avatar
     * @param string $country
     * @param array $games
     * @param array $game
     * @param int $level
     * @param int $elo
     * @param string $region
     * @param string $steamId64
     * @param string $faceitUrl
     * @param string $newSteamId
     * @param string|null $rankingRegion
     * @param string|null $rankingCountry
     * @param array $bans
     */
    public function __construct(
        string $id,
        string $nickname,
        ?string $avatar = null,
        string $country,
        array $games,
        array $game,
        int $level,
        int $elo,
        string $region,
        string $steamId64,
        string $faceitUrl,
        string $newSteamId,
        ?string $rankingRegion = null,
        ?string $rankingCountry = null,
        array $bans = []
    )
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->avatar = $avatar;
        $this->country = $country;
        $this->games = $games;
        $this->game = $game;
        $this->level = $level;
        $this->elo = $elo;
        $this->region = $region;
        $this->steamId64 = $steamId64;
        $this->faceitUrl = $faceitUrl;
        $this->newSteamId = $newSteamId;
        $this->rankingRegion = $rankingRegion;
        $this->rankingCountry = $rankingCountry;
        $this->bans = $bans;
    }

    /**
     * @param PlayerParser $parser
     * @return Player
     */
    public static function fromParser(PlayerParser $parser): Player
    {
        return new self(
            $parser->getId(),
            $parser->getNickname(),
            $parser->getAvatar(),
            $parser->getCountry(),
            $parser->getGames(),
            $parser->getGame(),
            $parser->getLevel(),
            $parser->getElo(),
            $parser->getRegion(),
            $parser->getSteamId64(),
            $parser->getFaceitUrl(),
            $parser->getNewSteamId(),
            $parser->getRankingRegion(),
            $parser->getRankingCountry(),
            $parser->getBans()
        );
    }
}