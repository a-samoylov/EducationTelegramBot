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

    private $chatId = null;
    private $text   = null;

    private $parseMode = null;

    private $disableWebPagePreview = null;
    private $disableNotification   = null;
    private $replyToMessageId      = null;

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
        return [
            'chat_id' => $this->chatId,
            'text'    => $this->text,
        ];
    }

    // ########################################

    public function setParseMarkdownMode()
    {
        $this->parseMode = self::MARKDOWN_PARSE_MODE;
    }

    public function setParseHtmlMode()
    {
        $this->parseMode = self::HTML_PARSE_MODE;
    }

    public function setParseDefaultMode()
    {
        $this->parseMode = null;
    }

    // ########################################

    public function setDisableWebPagePreview(bool $value)
    {
        $this->disableWebPagePreview = $value;
    }

    // ########################################

    public function setDisableNotification(bool $value)
    {
        $this->disableNotification = $value;
    }

    // ########################################

    public function setReplyToMessageId(int $value)
    {
        $this->replyToMessageId = $value;
    }

    // ########################################

    public function setReplyMarkup()
    {
        //todo
    }

    // ########################################
}
