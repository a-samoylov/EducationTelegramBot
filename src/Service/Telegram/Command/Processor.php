<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command;

class Processor
{
    /**
     * @var \App\Config\Telegram
     */
    private $telegramConfigs = null;

    /**
     * @var \Psr\Container\ContainerInterface
     */
    private $container = null;

    /**
     * @var \App\Service\Telegram\Command\ServiceResolver
     */
    private $serviceResolver;

    // ########################################

    public function __construct(
        \App\Config\Telegram $telegramConfigs,
        \Psr\Container\ContainerInterface $container,
        ServiceResolver $serviceResolver
    ) {
        $this->telegramConfigs = $telegramConfigs;
        $this->container       = $container;
        $this->serviceResolver = $serviceResolver;
    }

    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return string
     */
    public function process($update)
    {
        $serviceName = $this->serviceResolver->resolve($update);
        if (is_null($serviceName)) {
            //todo log
        }

        /** @var \App\Service\Telegram\Command\BaseAbstract $command */
        $command = $this->container->get($serviceName);

        return $command->process();
    }

    // ########################################
}
