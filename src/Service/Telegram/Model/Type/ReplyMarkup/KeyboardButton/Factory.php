<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\ReplyMarkup\KeyboardButton;

use App\Service\Telegram\Model\Type\ReplyMarkup\KeyboardButton;

class Factory
{
    // ########################################

    public function create(string $text, bool $requestContact = false, bool $requestLocation = false): KeyboardButton
    {
        return new KeyboardButton($text, $requestContact, $requestLocation);
    }

    // ########################################
}
