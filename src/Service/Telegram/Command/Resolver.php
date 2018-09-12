<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

class Resolver
{
    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return string
     */
    public function resolve($update): string
    {
        //todo instance of by updates, get params

        return 'telegram.start.command';
    }

    // ########################################
}
