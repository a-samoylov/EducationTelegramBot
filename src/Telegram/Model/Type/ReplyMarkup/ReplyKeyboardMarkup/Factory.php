<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup;

use App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup;

class Factory
{
    // ########################################

    /**
     * @param \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Entity[] $keyboardButtons
     * @param bool                                                  $resizeKeyboard
     * @param bool                                                  $oneTimeKeyboard
     * @param bool                                                  $selective
     *
     * @return \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup
     */
    public function create(
        array $keyboardButtons,
        bool $resizeKeyboard = false,
        bool $oneTimeKeyboard = false,
        bool $selective = false
    ): ReplyKeyboardMarkup {
        return new ReplyKeyboardMarkup(
            $keyboardButtons,
            $resizeKeyboard,
            $oneTimeKeyboard,
            $selective
        );
    }

    // ########################################
}