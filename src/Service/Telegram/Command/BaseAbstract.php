<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Service\Telegram\Command;

use App\Entity\TelegramUser;

abstract class BaseAbstract
{
    /** @var TelegramUser $user */
    private $user;

    // ########################################

    public function setUser(TelegramUser $user)
    {
        $this->user = $user;
    }

    protected function getUser(): TelegramUser
    {
        return $this->user;
    }

    // ########################################

    abstract public function process();

    // ########################################
}
