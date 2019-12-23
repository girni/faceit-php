<?php

namespace Tests\Feature;

use Girni\Faceit\Faceit;
use Girni\Faceit\Config\Credentials;
use Girni\Faceit\Model\Player;
use Girni\Faceit\Model\PlayerMatch;
use Girni\Faceit\Model\PlayerStats;
use GuzzleHttp\Client;
use Tests\TestCase;

class FaceitTest extends TestCase
{
    /**
     * @var Faceit
     */
    private Faceit $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new Faceit(new Client(), new Credentials($_ENV['API_KEY']));
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

    /** @test */
    public function test_it_can_fetch_matches_for_player()
    {
        // neo
        $playerMatches = $this->client->getMatches('d683100c-1452-47cc-af4a-b66efea476b0');

        $this->assertIsArray($playerMatches->all());
        $this->assertInstanceOf(PlayerMatch::class, $playerMatches->first());
        $this->assertInstanceOf(PlayerMatch::class, $playerMatches->last());
    }
}