<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Package\Message;

class Entity
{
    /** @var int */
    private $updateId;

    /** @var int */
    private $messageId;

    /** @var \DateTime */
    private $dateTime;

    /** @var string */
    private $text;

    /** @var \App\Service\Telegram\Package\Message\Entity\UserData */
    private $userData;

    /** @var string */
    private $commandType;

    // ########################################

    public function __construct(
        int $updateId,
        int $messageId,
        \DateTime $dateTime,
        string $text,
        Entity\UserData $userData,
        string $commandType = null
    ) {
        $this->updateId    = $updateId;
        $this->messageId   = $messageId;
        $this->dateTime    = $dateTime;
        $this->text        = $text;
        $this->userData    = $userData;
        $this->commandType = $commandType;
    }

    // ########################################

    public function getUpdateId(): int
    {
        return $this->updateId;
    }

    public function getMessageId(): int
    {
        return $this->messageId;
    }

    public function getDateTime(): \DateTime
    {
        return $this->dateTime;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getUserData(): \App\Service\Telegram\Package\Message\Entity\UserData
    {
        return $this->userData;
    }

    public function getCommandType(): ?string
    {
        return $this->commandType;
    }

    // ########################################
}
