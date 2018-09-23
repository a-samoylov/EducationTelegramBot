<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update;

class CallbackQuery
{
    // ########################################

    /**
     * Unique identifier for this query
     *
     * @var string
     */
    protected $id;

    /**
     * Sender
     *
     * @var \App\Service\Telegram\Model\Type\Base\User
     */
    protected $from;

    /**
     * Optional. Message with the callback button that originated the query.
     * Note that message content and message date will not be available
     * if the message is too old
     *
     * @var \App\Service\Telegram\Model\Type\Base\Message
     */
    protected $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode,
     * that originated the query.
     *
     * @var string
     */
    protected $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent.
     * Useful for high scores in games.
     *
     * @var string
     */
    protected $chatInstance;

    /**
     * Optional. Data associated with the callback button.
     * Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string
     */
    protected $data;

    /**
     * Optional. Short name of a Game to be returned,
     * serves as the unique identifier for the game
     *
     * @var string
     */
    protected $gameShortName;

    // ########################################

    /**
     * CallbackQuery constructor.
     *
     * @param string                                     $id
     * @param \App\Service\Telegram\Model\Type\Base\User $from
     * @param string                                     $chatInstance
     */
    public function __construct(string $id, \App\Service\Telegram\Model\Type\Base\User $from, string $chatInstance)
    {
        $this->id           = $id;
        $this->from         = $from;
        $this->chatInstance = $chatInstance;
    }

    // ########################################

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Base\User
     */
    public function getFrom(): \App\Service\Telegram\Model\Type\Base\User
    {
        return $this->from;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Base\User $from
     */
    public function setFrom(\App\Service\Telegram\Model\Type\Base\User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Base\Message
     */
    public function getMessage(): \App\Service\Telegram\Model\Type\Base\Message
    {
        return $this->message;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Base\Message $message
     */
    public function setMessage(\App\Service\Telegram\Model\Type\Base\Message $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getInlineMessageId(): string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $inlineMessageId
     */
    public function setInlineMessageId(string $inlineMessageId): void
    {
        $this->inlineMessageId = $inlineMessageId;
    }

    /**
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chatInstance;
    }

    /**
     * @param string $chatInstance
     */
    public function setChatInstance(string $chatInstance): void
    {
        $this->chatInstance = $chatInstance;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getGameShortName(): string
    {
        return $this->gameShortName;
    }

    /**
     * @param string $gameShortName
     */
    public function setGameShortName(string $gameShortName): void
    {
        $this->gameShortName = $gameShortName;
    }

    // ########################################
}