<?php

namespace Girni\Faceit\Model;

use Girni\Faceit\Parser\PlayerMatchesParser;

final class PlayerMatches
{
    /**
     * @var array PlayerMatch[]
     */
    public array $matches = [];

    /**
     * PlayerMatches constructor.
     * @param array $matches
     */
    public function __construct(array $matches)
    {
        $this->matches = $matches;
    }

    /**
     * @param PlayerMatchesParser $parser
     * @return PlayerMatches
     */
    public static function fromParser(PlayerMatchesParser $parser): PlayerMatches
    {
        return new self(
            $parser->getMatches(),
        );
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->matches;
    }

    /**
     * @return PlayerMatch|null
     */
    public function first(): ?PlayerMatch
    {
        return $this->matches[array_key_first($this->matches)] ?? null;
    }

    /**
     * @return PlayerMatch|null
     */
    public function last(): ?PlayerMatch
    {
        return $this->matches[array_key_last($this->matches)] ?? null;
    }
}