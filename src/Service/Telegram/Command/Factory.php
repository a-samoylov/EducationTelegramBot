<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;


class Factory
{
    // ########################################

    public function create($commandClass): BaseAbstract
    {
        return new $commandClass();
    }

    // ########################################
}
