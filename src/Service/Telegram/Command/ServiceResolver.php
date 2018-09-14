<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

class ServiceResolver
{
    private const DEFAULT_COMMAND_SERVICE = 'telegram.default.command';

    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return string
     */
    public function resolve($update): ?string
    {
        //todo instance of by updates, get params

        //todo log if cant found
        return 'telegram.start.command';
    }

    // ########################################
}
