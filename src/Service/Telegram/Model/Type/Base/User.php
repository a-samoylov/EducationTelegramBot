<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Base;

class User
{
    // ########################################

    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    private $id;

    /**
     * True, if this user is a bot
     *
     * @var bool
     */
    private $isBot;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    private $firstName;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string
     */
    private $lastName;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string
     */
    private $username;

    /**
     * Optional. IETF language tag of the user's language
     *
     * @var string
     */
    private $languageCode;

    // ########################################

    public function __construct(
        int $id,
        bool $isBot,
        string $firstName,
        string $lastName = null,
        string $username = null,
        string $languageCode = null
    ) {
        $this->id           = $id;
        $this->isBot        = $isBot;
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->username     = $username;
        $this->languageCode = $languageCode;
    }

    // ########################################

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }

    public function isBot(): bool
    {
        return $this->isBot;
    }

    // ########################################
}
