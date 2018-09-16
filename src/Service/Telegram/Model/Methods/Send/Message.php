<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Methods\Send;

class Message extends BaseAbstract
{
    private const HTML_PARSE_MODE     = 'HTML';
    private const MARKDOWN_PARSE_MODE = 'Markdown';

    // ########################################

    /**
     * @var int
     */
    private $chatId;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $parseMode;

    /**
     * @var bool
     */
    private $disableWebPagePreview;

    /**
     * @var bool
     */
    private $disableNotification;

    /**
     * @var int
     */
    private $replyToMessageId;

    /**
     * @var \App\Service\Telegram\Model\Type\ReplyMarkup\BaseAbstract
     */
    private $replyMarkup;

    // ########################################

    /**
     * @param string|integer                           $chatId
     * @param string                                   $text
     * @param \App\Service\Telegram\Model\Request\Json $jsonRequest
     */
    public function __construct($chatId, string $text, \App\Service\Telegram\Model\Request\Json $jsonRequest)
    {
        $this->chatId = $chatId;
        $this->text   = $text;

        parent::__construct($jsonRequest);
    }

    // ########################################

    protected function getMethodName(): string
    {
        return 'sendMessage';
    }

    protected function getRequestParams(): array
    {
        $result = [
            'chat_id'      => $this->chatId,
            'text'         => $this->text,
            'reply_markup' => [
                'keyboard' => [
                    [
                        ['text' => 'Надіслати', 'request_contact' => true],
                        ['text' => 'Текст'],
                    ]
                ]
            ],
            'resize_keyboard' => true
        ];



        if ($this->hasReplyMarkup()) {
            if ($this->isReplyMarkupReplyKeyboardMarkup()) {

            }
            //if (current($this->replyMarkup) instanceof \App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton) {
            //    $inlineKeyboardButtonsArray = [];
            //
            //    /**
            //     * @var \App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton $inlineKeyboardButton
            //     */
            //    foreach ($this->replyMarkup as $inlineKeyboardButton) {
            //        $inlineKeyboardButtonsArray[] = [
            //            'text' => $inlineKeyboardButton->getText(),
            //            'callback_data' => 'asd'
            //        ];
            //    }
            //
            //    $result['reply_markup'] = [];
            //    $result['reply_markup']['inline_keyboard'] = [];
            //    $result['reply_markup']['inline_keyboard'][] = $inlineKeyboardButtonsArray;
            //}
        }

        return $result;
    }

    // ########################################

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chatId;
    }

    /**
     * @param int $chatId
     */
    public function setChatId(int $chatId): void
    {
        $this->chatId = $chatId;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    // ########################################

    /**
     * @return string
     */
    public function getParseMode(): string
    {
        return $this->parseMode;
    }

    public function setParseMarkdownMode(): void
    {
        $this->parseMode = self::MARKDOWN_PARSE_MODE;
    }

    public function setParseHtmlMode(): void
    {
        $this->parseMode = self::HTML_PARSE_MODE;
    }

    public function setParseDefaultMode(): void
    {
        $this->parseMode = null;
    }

    // ########################################

    /**
     * @return bool
     */
    public function isDisableWebPagePreview(): bool
    {
        return $this->disableWebPagePreview;
    }

    /**
     * @param bool $disableWebPagePreview
     */
    public function setDisableWebPagePreview(bool $disableWebPagePreview): void
    {
        $this->disableWebPagePreview = $disableWebPagePreview;
    }

    /**
     * @return bool
     */
    public function isDisableNotification(): bool
    {
        return $this->disableNotification;
    }

    /**
     * @param bool $disableNotification
     */
    public function setDisableNotification(bool $disableNotification): void
    {
        $this->disableNotification = $disableNotification;
    }

    /**
     * @return int
     */
    public function getReplyToMessageId(): int
    {
        return $this->replyToMessageId;
    }

    /**
     * @param int $replyToMessageId
     */
    public function setReplyToMessageId(int $replyToMessageId): void
    {
        $this->replyToMessageId = $replyToMessageId;
    }

    // ########################################

    /**
     * @return \App\Service\Telegram\Model\Type\ReplyMarkup\BaseAbstract
     */
    public function getReplyMarkup(): \App\Service\Telegram\Model\Type\ReplyMarkup\BaseAbstract
    {
        return $this->replyMarkup;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\ReplyMarkup\BaseAbstract $replyMarkup
     */
    public function setReplyMarkup(\App\Service\Telegram\Model\Type\ReplyMarkup\BaseAbstract $replyMarkup): void
    {
        $this->replyMarkup = $replyMarkup;
    }

    /**
     * @return bool
     */
    public function hasReplyMarkup(): bool
    {
        return is_null($this->replyMarkup);
    }

    /**
     * @return bool
     */
    public function isReplyMarkupInlineKeyboardMarkup(): bool
    {
        if (!$this->hasReplyMarkup()) {
            return false;
        }

        return $this->replyMarkup instanceof \App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup;
    }

    /**
     * @return bool
     */
    public function isReplyMarkupReplyKeyboardMarkup(): bool
    {
        if (!$this->hasReplyMarkup()) {
            return false;
        }

        return $this->replyMarkup instanceof \App\Service\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup;
    }

    /**
     * @return bool
     */
    public function isReplyMarkupReplyReplyKeyboardRemove(): bool
    {
        if (!$this->hasReplyMarkup()) {
            return false;
        }

        return $this->replyMarkup instanceof \App\Service\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardRemove;
    }

    /**
     * @return bool
     */
    public function isReplyMarkupReplyForceReply(): bool
    {
        if (!$this->hasReplyMarkup()) {
            return false;
        }

        return $this->replyMarkup instanceof \App\Service\Telegram\Model\Type\ReplyMarkup\ForceReply;
    }

    // ########################################
}
