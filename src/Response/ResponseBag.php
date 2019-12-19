<?php

namespace Girni\Faceit\Response;

use Girni\Faceit\Exception\InvalidResponseException;
use Psr\Http\Message\ResponseInterface;

class ResponseBag
{
    /**
     * @var array
     */
    private array $data = [];

    /**
     * ResponseBag constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param ResponseInterface $response
     * @return ResponseBag
     * @throws InvalidResponseException
     */
    public static function fromResponse(ResponseInterface $response): ResponseBag
    {
        $data = json_decode(
            $response->getBody()->getContents(),
            true
        );

        if (empty($data)) {
            throw new InvalidResponseException('Response is invalid');
        }

        return new self($data);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}