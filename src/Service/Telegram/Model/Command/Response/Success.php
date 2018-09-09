<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Command\Response;

class Success
{
    private $result;

    // ########################################

    public function __construct($result = null)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    // ########################################
}
