<?php

namespace Tests\Feature;

use Girni\Faceit\FaceitClient;
use Girni\Faceit\Config\Credentials;
use Girni\Faceit\Model\Player;
use Girni\Faceit\Model\PlayerStats;
use GuzzleHttp\Client;
use Tests\TestCase;

class FaceitClientTest extends TestCase
{
    /**
     * @var FaceitClient
     */
    private FaceitClient $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new FaceitClient(new Client(), new Credentials($_ENV['API_KEY']));
    }

    /** @test */
    public function test_it_can_fetch_player_by_nickname()
    {
        $player = $this->client->getPlayerByNickname('neo');

        $this->assertInstanceOf(Player::class, $player);
        $this->assertIsString($player->id);
        $this->assertIsString($player->avatar);
        $this->assertIsString($player->nickname);
        $this->assertIsString($player->country);
        $this->assertIsString($player->newSteamId);
        $this->assertIsString($player->faceitUrl);
        $this->assertIsInt($player->level);
        $this->assertIsInt($player->elo);
        $this->assertIsArray($player->games);
        $this->assertIsArray($player->game);
        $this->assertIsArray($player->bans);
        $this->assertIsString($player->region);
        $this->assertIsString($player->steamId64);
        $this->assertNull($player->rankingRegion);
        $this->assertNull($player->rankingCountry);
    }

    /** @test */
    public function test_it_can_fetch_player_stats()
    {
        // neo
        $playerStats = $this->client->getPlayerStats('d683100c-1452-47cc-af4a-b66efea476b0');

        $this->assertInstanceOf(PlayerStats::class, $playerStats);
    }

    public function test_it_can_fetch_matches_for_player()
    {
        $playerStats = $this->client->getMatches('d683100c-1452-47cc-af4a-b66efea476b0');

    }
}