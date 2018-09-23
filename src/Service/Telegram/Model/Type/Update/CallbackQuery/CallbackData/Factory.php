<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update\CallbackQuery\CallbackData;

use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Update\CallbackQuery\CallbackData;
use App\Model\Exception\Validate as ValidateException;

class Factory implements FactoryInterface
{
    // ########################################

    public function create(array $data): CallbackData
    {
        if (empty($data['id']) && is_int($data['id'])) {
            throw new ValidateException(self::class, 'id');
        }

        if (empty($data['btn']) && is_int($data['btn'])) {
            throw new ValidateException(self::class, 'btn');
        }

        return new CallbackData($data['id'], $data['btn']);
    }

    // ########################################
}
