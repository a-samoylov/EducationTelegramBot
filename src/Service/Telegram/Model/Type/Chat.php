<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type;

class Chat
{
    // ########################################

    /**
     * Unique identifier for this chat, not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string
     */
    protected $type;

    /**
     * Optional. Title, for channels and group chats
     *
     * @var string
     */
    protected $title;

    /**
     * Optional. Username, for private chats and channels if available
     *
     * @var string
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string
     */
    protected $lastName;

    /**
     * Optional. True if a group has ‘All Members Are Admins’ enabled.
     *
     * @var bool
     */
    protected $allMembersAreAdministrators;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto
     */
    protected $photo;

    /**
     * Optional. Description, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected $description;

    /**
     * Optional. Chat invite link, for supergroups and channel chats. Returned only in getChat.
     *
     * @var string
     */
    protected $inviteLink;

    /**
     * Optional. Pinned message, for supergroups. Returned only in getChat.
     *
     * @var Message
     */
    protected $pinnedMessage;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool
     */
    protected $canSetStickerSet;

    // ########################################

    public function __construct(
        int $id,
        string $type,
        string $title = null,
        string $username = null,
        string $firstName = null,
        string $lastName = null,
        bool $allMembersAreAdministrators = null,
        ChatPhoto $photo = null,
        string $description = null,
        string $inviteLink = null,
        Message $pinnedMessage = null,
        string $stickerSetName = null,
        bool $canSetStickerSet = null
    ) {
        $this->id                          = $id;
        $this->type                        = $type;
        $this->title                       = $title;
        $this->username                    = $username;
        $this->firstName                   = $firstName;
        $this->lastName                    = $lastName;
        $this->allMembersAreAdministrators = $allMembersAreAdministrators;
        $this->photo                       = $photo;
        $this->description                 = $description;
        $this->inviteLink                  = $inviteLink;
        $this->pinnedMessage               = $pinnedMessage;
        $this->stickerSetName              = $stickerSetName;
        $this->canSetStickerSet            = $canSetStickerSet;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return bool
     */
    public function isAllMembersAreAdministrators(): bool
    {
        return $this->allMembersAreAdministrators;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\ChatPhoto
     */
    public function getPhoto(): \App\Service\Telegram\Model\Type\ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getInviteLink(): string
    {
        return $this->inviteLink;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getPinnedMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @return string
     */
    public function getStickerSetName(): string
    {
        return $this->stickerSetName;
    }

    /**
     * @return bool
     */
    public function isCanSetStickerSet(): bool
    {
        return $this->canSetStickerSet;
    }

    // ########################################
}
