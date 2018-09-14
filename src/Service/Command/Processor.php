<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command;

use Psr\Log\LoggerInterface;

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
     * @var \App\Service\Command\ServiceResolver
     */
    private $serviceResolver;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    // ########################################

    public function __construct(
        \App\Config\Telegram $telegramConfigs,
        \Psr\Container\ContainerInterface $container,
        ServiceResolver $serviceResolver,
        LoggerInterface $logger
    ) {
        $this->telegramConfigs = $telegramConfigs;
        $this->container       = $container;
        $this->serviceResolver = $serviceResolver;
        $this->logger          = $logger;
    }

    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return \App\Model\Command\Response
     */
    public function process($update)
    {
        /** @var string $serviceName */
        $serviceName = $this->serviceResolver->resolve($update);

        /** @var \App\Model\Command\BaseAbstract $command */
        $command = $this->container->get($serviceName);

        return $command->process();
    }

    // ########################################
}