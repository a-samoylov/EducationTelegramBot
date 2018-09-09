<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

use App\Config\Telegram as TelegramConfigs;
use App\Entity\TelegramUser;

class Loader
{
    /** @var \App\Config\Telegram */
    private $telegramConfigs;

    // ########################################

    public function __construct(TelegramConfigs $telegramConfigs)
    {
        $this->telegramConfigs = $telegramConfigs;
    }

    // ########################################

    public function process(TelegramUser $telegramUser, string $text, ?string $type, \DateTime $dateTime)
    {
        list($commandClass, $commandValidators) = $this->telegramConfigs->getCommandClass($text, $type);

        /** @var \App\Service\Telegram\Command\BaseInterface $command */
        $command = new $commandClass;

        return $command->process();
    }

    // ########################################
}
