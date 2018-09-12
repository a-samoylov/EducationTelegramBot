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
     * @var \App\Service\Telegram\Command\Resolver
     */
    private $resolver;

    // ########################################

    public function __construct(
        \App\Config\Telegram $telegramConfigs,
        \Psr\Container\ContainerInterface $container,
        Resolver $resolver
    ) {
        $this->telegramConfigs = $telegramConfigs;
        $this->container       = $container;
        $this->resolver        = $resolver;
    }

    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return string
     */
    public function process($update)
    {
        /** @var \App\Service\Telegram\Command\BaseAbstract $command */
        $command = $this->container->get($this->resolver->resolve($update));

        return $command->process();
    }

    // ########################################
}
