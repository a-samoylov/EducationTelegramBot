<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton;

use App\Model\Exception\Validate as ValidateException;
use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton;

class Factory implements FactoryInterface
{
    // ########################################

    public function create(array $data): InlineKeyboardButton
    {
        if (empty($data['text'] || !is_string($data['text']))) {
            throw new ValidateException(self::class, 'text', $data);
        }
        return new InlineKeyboardButton($data['text']);
    }

    // ########################################
}
