<?php

namespace Girni\Faceit\Request\Player;

use Girni\Faceit\Config\Url;
use Girni\Faceit\Request\Request;
use Girni\Faceit\Request\RequestInterface;

final class PlayerByNicknameRequest extends Request implements RequestInterface
{
    /**
     * @var string
     */
    protected string $baseUrl = Url::DATA_API;

    /**
     * @var string
     */
    protected string $baseUri = 'players';

    /**
     * @var string
     */
    private string $nickname;

    /**
     * PlayerByNicknameRequest constructor.
     * @param string $nickname
     */
    public function __construct(string $nickname)
    {
        parent::__construct();

        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        $this->setQueryParam('nickname', $this->nickname);

        return parent::getUrl();
    }
}