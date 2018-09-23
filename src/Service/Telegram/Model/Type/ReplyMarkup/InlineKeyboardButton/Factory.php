<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton;

class Factory
{
    // ########################################

    public function create(string $text): Entity
    {
        return new Entity($text);
    }

    // ########################################
}
