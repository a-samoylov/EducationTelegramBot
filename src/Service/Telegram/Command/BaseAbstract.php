<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Service\Telegram\Command;

abstract class BaseAbstract
{
    /** @var \App\Entity\TelegramUser $user */
    private $user = null;

    /** @var \Psr\Container\ContainerInterface $user */
    private $container = null;

    // ########################################

    public function process()
    {
        $this->initialize();
        $this->execute();

        return 'success)'; //todo obj
    }

    // ########################################

    protected function getContainer()
    {
       return $this->container;
    }

    public function setContainer(\Psr\Container\ContainerInterface $container)
    {
        $this->container = $container;
    }

    // ########################################

    protected function getUser(): \App\Entity\TelegramUser
    {
        return $this->user;
    }

    public function setUser(\App\Entity\TelegramUser $user)
    {
        $this->user = $user;
    }

    // ########################################

    abstract protected function initialize();

    abstract protected function execute();

    // ########################################
}
