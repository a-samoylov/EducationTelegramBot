<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Message;

use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Message;

class Factory implements FactoryInterface
{
    // ########################################

    public function create(array $data): Message
    {
        return new Message();
    }

    // ########################################
}
