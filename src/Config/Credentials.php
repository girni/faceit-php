<?php

namespace Girni\Faceit\Config;

final class Credentials
{
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * Credentials constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }
}