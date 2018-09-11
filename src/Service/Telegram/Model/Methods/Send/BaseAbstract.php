<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Methods\Send;

abstract class BaseAbstract
{
    // ########################################

    /** @var \App\Service\Telegram\Model\Request\Json */
    private $jsonRequest = null;

    public function __construct(\App\Service\Telegram\Model\Request\Json $jsonRequest)
    {
        $this->jsonRequest = $jsonRequest;
    }

    // ########################################

    public function send()
    {
        $this->jsonRequest->execute($this->getMethodName(), $this->getRequestParams());
    }

    // ########################################

    abstract protected function getMethodName(): string;

    abstract protected function getRequestParams(): array;

    // ########################################
}
