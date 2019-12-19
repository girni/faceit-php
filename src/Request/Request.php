<?php

namespace Girni\Faceit\Request;

use Girni\Faceit\Config\Method;

class Request
{
    /**
     * @var string
     */
    protected string $url;

    /**
     * @var array
     */
    protected array $uriParams = [];

    /**
     * @var array
     */
    protected array $queryParams = [];

    /**
     * By default 'GET'
     * @var string
     */
    protected string $method = Method::GET;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->setUrl($this->baseUrl, $this->baseUri);
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return sprintf(
            '%s?%s',
            $this->buildUrl(),
            $this->buildHttpQuery()
        );
    }

    /**
     * @param string $baseUrl
     * @param string $uri
     */
    protected function setUrl(string $baseUrl, string $uri): void
    {
        $this->url = sprintf('%s/%s', $baseUrl, $uri);
    }

    /**
     * @param string $name
     * @param string $value
     */
    protected function setUriParam(string $name, string $value): void
    {
        $this->uriParams[$name] = $value;
    }

    /**
     * @param array $params
     */
    protected function setUriParams(array $params): void
    {
        $this->uriParams = $params;
    }

    /**
     * @param string $name
     * @param string $value
     */
    protected function setQueryParam(string $name, string $value): void
    {
        $this->queryParams[$name] = $value;
    }

    /**
     * @param array $params
     */
    protected function setQueryParams(array $params): void
    {
        $this->queryParams = $params;
    }

    /**
     * @return string
     */
    protected function buildHttpQuery(): string
    {
        return http_build_query($this->queryParams);
    }

    /**
     * @return string
     */
    protected function buildUrl(): string
    {
        return str_replace(
            array_keys($this->uriParams),
            array_values($this->uriParams),
            $this->url
        );
    }
}