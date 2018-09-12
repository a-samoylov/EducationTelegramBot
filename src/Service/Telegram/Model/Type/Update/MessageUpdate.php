<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update;

class MessageUpdate extends BaseAbstract
{
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
        parent::__construct($updateId);
        $this->message = $message;
    }

    // ########################################

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->message;
    }

    // ########################################
}
