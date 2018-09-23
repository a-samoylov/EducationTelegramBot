<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup;

use App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup;

class Factory
{
    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Entity[] $inlineKeyboard $inlineKeyboard
     *
     * @return \App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup
     */
    public function create(array $inlineKeyboard): InlineKeyboardMarkup
    {
        return new InlineKeyboardMarkup($inlineKeyboard);
    }

    // ########################################
}