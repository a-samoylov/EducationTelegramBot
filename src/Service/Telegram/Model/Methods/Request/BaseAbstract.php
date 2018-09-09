<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Methods\Request;

use App\Config\Telegram as TelegramConfig;

class BaseAbstract
{
    /** @var \App\Service\Telegram\Model\Request\Curl $curlRequest*/
    protected $curlRequest;

    /** @var string $apiUrl*/
    private $apiUrl = null;

    // ########################################

    public function __construct(Curl $curlRequest, TelegramConfig $telegramConfig)
    {
        $this->apiUrl      = $telegramConfig->getApiUrl();
        $this->curlRequest = $curlRequest;
    }

    // ########################################

    protected function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    // ########################################
}
