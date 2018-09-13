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
    private $chatId = null;

    /**
     * @var string
     */
    private $text = null;

    /**
     * @var string
     */
    private $parseMode = null;

    /**
     * @var bool
     */
    private $disableWebPagePreview = null;

    /**
     * @var bool
     */
    private $disableNotification = null;

    /**
     * @var int
     */
    private $replyToMessageId = null;

    /**
     * @var array
     */
    private $replyMarkup = null;

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
            'chat_id' => $this->chatId,
            'text'    => $this->text,
        ];

        if ($this->hasReplyMarkup()) {
            if (current($this->replyMarkup) instanceof \App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton) {
                $inlineKeyboardButtonsArray = [];

                /**
                 * @var \App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton $inlineKeyboardButton
                 */
                foreach ($this->replyMarkup as $inlineKeyboardButton) {
                    $inlineKeyboardButtonsArray[] = [
                        'text' => $inlineKeyboardButton->getText(),
                        'callback_data' => 'asd'
                    ];
                }

                $result['reply_markup'] = [];
                $result['reply_markup']['inline_keyboard'] = [];
                $result['reply_markup']['inline_keyboard'][] = $inlineKeyboardButtonsArray;
            }
        }

        return $result;
    }

    // ########################################

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

    public function setDisableWebPagePreview(bool $value): void
    {
        $this->disableWebPagePreview = $value;
    }

    // ########################################

    public function setDisableNotification(bool $value): void
    {
        $this->disableNotification = $value;
    }

    // ########################################

    public function setReplyToMessageId(int $replyToMessageId): void
    {
        $this->replyToMessageId = $replyToMessageId;
    }

    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton[] $replyMarkup
     */
    public function setReplyMarkup(array $replyMarkup)
    {
        $this->replyMarkup = $replyMarkup;
    }

    public function hasReplyMarkup(): bool
    {
        return !is_null($this->replyMarkup);
    }

    // ########################################
}
