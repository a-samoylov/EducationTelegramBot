<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command;

class Response
{
    /**
     * @var bool
     */
    private $isSuccess;

    // ########################################

    public function __construct(bool $isSuccess)
    {
        $this->isSuccess = $isSuccess;
    }

    // ########################################

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    // ########################################
}
