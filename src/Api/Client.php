<?php

namespace Girni\Faceit\Api;

use Girni\Faceit\Config\Credentials;
use Girni\Faceit\Exception\FaceitApiConnectionException;
use Girni\Faceit\Request\RequestInterface;
use Girni\Faceit\Response\ResponseBag;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Girni\Faceit\Exception\InvalidResponseException;
use Exception;

class Client
{
    /**
     * @var ClientInterface
     */
    private ClientInterface $client;

    /**
     * @var Credentials
     */
    private Credentials $credentials;

    /**
     * Client constructor.
     * @param ClientInterface $client
     * @param Credentials $credentials
     */
    public function __construct(ClientInterface $client, Credentials $credentials)
    {
        $this->client = $client;
        $this->credentials = $credentials;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseBag
     * @throws FaceitApiConnectionException
     * @throws GuzzleException
     * @throws InvalidResponseException
     */
    public function request(RequestInterface $request): ResponseBag
    {
        try {
            $response = $this->client->request(
                $request->getMethod(),
                $request->getUrl(),
                [
                    'headers' => [
                        'Accept'     => 'application/json',
                        'Authorization' => "Bearer {$this->credentials->getApiKey()}"
                    ]
                ]
            );
        } catch(Exception $e) {
            throw new FaceitApiConnectionException($e->getMessage(), $e->getCode());
        }

        return ResponseBag::fromResponse($response);
    }
}