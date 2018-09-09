<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

use App\Service\Telegram\Model\Request\Json as JsonRequest;

class Factory
{
    /** @var JsonRequest $jsonRequest */
    private $jsonRequest;

    // ########################################

    public function __construct(JsonRequest $jsonRequest)
    {
        $this->jsonRequest = $jsonRequest;
    }

    // ########################################

    public function create($commandClass): BaseAbstract
    {
        return new $commandClass($this->jsonRequest);
    }

    // ########################################
}
