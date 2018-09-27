<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Telegram\Model\Type\ReplyMarkup;

class InlineKeyboardMarkup extends BaseAbstract
{
    // ########################################

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects
     *
     * @var \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\InlineKeyboardButton[]
     */
    protected $inlineKeyboard;

    // ########################################

    /**
     * InlineKeyboardMarkup constructor.
     *
     * @param \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\InlineKeyboardButton[] $inlineKeyboard
     */
    public function __construct(array $inlineKeyboard)
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    // ########################################

    /**
     * @return \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\InlineKeyboardButton[]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inlineKeyboard;
    }

    /**
     * @param \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\InlineKeyboardButton[] $inlineKeyboard
     */
    public function setInlineKeyboard(array $inlineKeyboard): void
    {
        $this->inlineKeyboard = $inlineKeyboard;
    }

    // ########################################
}
