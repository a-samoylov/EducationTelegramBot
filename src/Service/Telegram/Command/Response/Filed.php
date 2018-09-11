<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command\Response;

class Filed
{
    private $message = null;
    private $info    = null;

    // ########################################

    public function __construct(string $message, $info = null)
    {
        $this->info    = $info;
        $this->message = $message;
    }

    // ########################################

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getInfo()
    {
        return $this->info;
    }

    // ########################################
}
