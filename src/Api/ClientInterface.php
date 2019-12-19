<?php

namespace Girni\Faceit\Api;

use Girni\Faceit\Request\RequestInterface;
use Girni\Faceit\Response\ResponseBag;

interface ClientInterface
{
    public function request(RequestInterface $request): ResponseBag;
}