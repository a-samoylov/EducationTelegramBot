<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton;

use App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton;

class Factory
{
    // ########################################

    public function create(string $text): InlineKeyboardButton
    {
        return new InlineKeyboardButton($text);
    }

    // ########################################
}
