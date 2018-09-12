<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update;

class MessageUpdate
{
    /**
     * The update‘s unique identifier.
     * Update identifiers start from a certain positive number and increase sequentially.
     * This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or
     * to restore the correct update sequence, should they get out of order.
     *
     * @var integer
     */
    protected $updateId;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     *
     * @var \App\Service\Telegram\Model\Type\Message
     */
    protected $message;

    /**
     * MessageUpdate constructor.
     *
     * @param int                                      $updateId
     * @param \App\Service\Telegram\Model\Type\Message $message
     */
    public function __construct(int $updateId, \App\Service\Telegram\Model\Type\Message $message)
    {
        $this->updateId = $updateId;
        $this->message  = $message;
    }

    // ########################################

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->updateId;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->message;
    }

    // ########################################
}
