<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

use App\Entity\TelegramUser;
use App\Config\Telegram as TelegramConfigs;
use App\Service\Telegram\Command\Factory as CommandFactory;

class Loader
{
    /** @var TelegramConfigs $telegramConfigs*/
    private $telegramConfigs;

    /** @var CommandFactory $commandFactory */
    private $commandFactory;

    // ########################################

    public function __construct(TelegramConfigs $telegramConfigs, CommandFactory $commandFactory)
    {
        $this->telegramConfigs = $telegramConfigs;
        $this->commandFactory  = $commandFactory;
    }

    // ########################################

    public function process(TelegramUser $telegramUser, string $commandAlias, ?string $commandType, \DateTime $dateTime, $params = [])
    {
        list($commandClass, $commandValidators) = $this->telegramConfigs->getCommandClass($commandAlias, $commandType);

        /** @var \App\Service\Telegram\Command\BaseAbstract $command */
        $command = $this->commandFactory->create($commandClass);
        $command->setUser($telegramUser);

        //todo validate
        foreach ($commandValidators as $validator) {

        }

        return $command->process();
    }

    // ########################################
}
