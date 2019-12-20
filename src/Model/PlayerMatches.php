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
}