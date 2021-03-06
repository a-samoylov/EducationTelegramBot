<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Telegram\Model\Request;

use App\Command\Response;

class BaseAbstract
{
    /** @var \App\Telegram\Model\Request\Curl $curlRequest */
    protected $curlRequest;

    /** @var string $apiUrl */
    private $apiUrl;

    /** @var \App\Command\Response\Factory */
    private $responseFactory;

    // ########################################

    public function __construct(
        Curl $curlRequest,
        \App\Config\Telegram $telegramConfig
    ) {
        $this->apiUrl          = $telegramConfig->getApiUrl();
        $this->curlRequest     = $curlRequest;
    }

    // ########################################

    protected function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    // ########################################
}
