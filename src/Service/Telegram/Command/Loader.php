<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

class Loader
{
    /** @var \App\Config\Telegram */
    private $telegramConfigs = null;

    /** @var \App\Service\Telegram\Command\Factory */
    private $commandFactory = null;

    /** @var \Psr\Container\ContainerInterface */
    private $container = null;

    // ########################################

    public function __construct(
        \App\Config\Telegram $telegramConfigs,
        \App\Service\Telegram\Command\Factory $commandFactory,
        \Psr\Container\ContainerInterface $container
    ) {
        $this->telegramConfigs = $telegramConfigs;
        $this->commandFactory  = $commandFactory;
        $this->container = $container;
    }

    // ########################################

    public function process(
        \App\Entity\TelegramUser $telegramUser,
        string $commandAlias,
        ?string $commandType,
        \DateTime $dateTime,
        $params = []
    ) {
        list($commandClass, $commandValidators) = $this->telegramConfigs->getCommandClass($commandAlias, $commandType);

        /** @var \App\Service\Telegram\Command\BaseAbstract $command */
        $command = $this->commandFactory->create($commandClass);
        $command->setUser($telegramUser);
        $command->setContainer($this->container);

        return $command->process();
    }

    // ########################################
}
