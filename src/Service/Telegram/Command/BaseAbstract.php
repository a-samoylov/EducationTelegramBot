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
    // ########################################

    abstract public function process(): string;//todo responseObj

    // ########################################
}
