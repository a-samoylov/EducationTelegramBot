<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Service\Telegram\Command;

use App\Entity\TelegramUser;
use App\Service\Telegram\Model\Request\Json as JsonRequest;

abstract class BaseAbstract
{
    /** @var TelegramUser $user */
    private $user;

    /** @var JsonRequest $jsonRequest */
    private $jsonRequest;

    // ########################################

    public function __construct(JsonRequest $jsonRequest)
    {
        $this->jsonRequest = $jsonRequest;
    }

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

    protected function makeJsonRequest($method, array $params = [])
    {
        return $this->jsonRequest->execute($method, $params);
    }

    // ########################################
}
