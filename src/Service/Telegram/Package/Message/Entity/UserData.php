<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Package\Message\Entity;

class UserData
{
    private const PRIVATE_TYPE = 'private';

    // ########################################

    /** @var int */
    private $chatId;

    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var bool */
    private $isBot;

    /** @var string */
    private $languageCode;

    /** @var string */
    private $type;

    // ########################################

    public function __construct(
        int $chatId,
        string $firstName,
        string $lastName,
        bool $isBot,
        string $languageCode,
        string $type
    ) {
        $this->chatId       = $chatId;
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->isBot        = $isBot;
        $this->type         = $type;
        $this->languageCode = $languageCode;
    }

    // ########################################

    public function getChatId(): int
    {
        return $this->chatId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function isBot(): bool
    {
        return $this->isBot;
    }

    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }

    public function isPrivateType(): bool
    {
        return $this->type == self::PRIVATE_TYPE;
    }

    // ########################################
}
