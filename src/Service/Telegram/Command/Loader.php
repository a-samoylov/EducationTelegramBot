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

    /** @var \Psr\Container\ContainerInterface */
    private $container = null;

    // ########################################

    public function __construct(
        \App\Config\Telegram $telegramConfigs,
        \Psr\Container\ContainerInterface $container
    ) {
        $this->telegramConfigs = $telegramConfigs;
        $this->container       = $container;
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

        //todo get service alias
        $serviceName = 'telegram.start.command';


        /** @var \App\Service\Telegram\Command\BaseAbstract $command */
        $command = $this->container->get($serviceName);
        $command->setUser($telegramUser);

        return $command->process();
    }

    // ########################################
}
