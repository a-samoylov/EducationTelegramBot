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

    abstract public function process(): string;//todo responseObj

    // ########################################
}
