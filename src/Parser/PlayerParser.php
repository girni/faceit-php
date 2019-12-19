<?php


namespace Girni\Faceit\Parser;

use Girni\Faceit\Model\Player;
use Girni\Faceit\Response\ResponseBag;

final class PlayerParser implements ParserInterface
{
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
     * @return Player
     */
    public function getModel(): Player
    {
        return Player::fromParser($this);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->data['player_id'];
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->data['nickname'];
    }

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->data['avatar'] ?? null;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->data['country'];
    }

    /**
     * @return array
     */
    public function getGames(): array
    {
        return $this->data['games'];
    }

    /**
     * @param string $game
     * @return array|null
     */
    public function getGame(string $game = 'csgo'): ?array
    {
        return $this->getGames()[$game] ?? null;
    }

    /**
     * @param string $game
     * @return int
     */
    public function getLevel(string $game = 'csgo'): int
    {
        return $this->getGame($game)['skill_level'] ?? 0;
    }

    /**
     * @param string $game
     * @return int
     */
    public function getElo(string $game = 'csgo'): int
    {
        return $this->getGame($game)['faceit_elo'] ?? 0;
    }

    /**
     * @param string $game
     * @return string
     */
    public function getRegion(string $game = 'csgo'): string
    {
        return $this->getGame($game)['region'] ?? 'EU';
    }

    /**
     * @return string
     */
    public function getSteamId64(): string
    {
        return $this->data['steam_id_64'];
    }

    /**
     * @return string
     */
    public function getFaceitUrl(): string
    {
        return str_replace("{lang}", "en", $this->data['faceit_url']);
    }

    /**
     * @return string
     */
    public function getNewSteamId(): string
    {
        return $this->data['new_steam_id'];
    }

    /**
     * @return string|null
     */
    public function getRankingRegion(): ?string
    {
        return isset($this->data['ranking_region']) ? $this->data['ranking_region'] : null;
    }

    /**
     * @return string|null
     */
    public function getRankingCountry(): ?string
    {
        return isset($this->data['ranking_country']) ? $this->data['ranking_country'] : null;
    }

    /**
     * @return array
     */
    public function getBans(): array
    {
        return $this->data['bans'];
    }
}