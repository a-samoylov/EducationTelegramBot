<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type;

class Message
{
    /**
     * Unique message identifier
     *
     * @var int
     */
    protected $messageId;

    /**
     * Optional. Sender name. Can be empty for messages sent to channels
     *
     * @var User
     */
    protected $from;

    /**
     * Date the message was sent in Unix time
     *
     * @var \DateTime
     */
    protected $date;

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @var Chat
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var User
     */
    protected $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about the original channel
     *
     * @var Chat
     */
    protected $forwardFromChat;

    /**
     * Optional. For messages forwarded from channels, identifier of the original message in the channel
     *
     * @var int
     */
    protected $forwardFromMessageId;


    /**
     * Optional. For messages forwarded from channels, signature of the post author if present
     *
     * @var string
     */
    protected $forwardSignature;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var \DateTime
     */
    protected $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @var Message
     */
    protected $replyToMessage;

    /**
     * Optional. Date the message was last edited in Unix time
     *
     * @var \DateTime
     */
    protected $editDate;

    /**
     * Optional. The unique identifier of a media message group this message belongs to
     *
     * @var int
     */
    protected $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels
     *
     * @var string
     */
    protected $authorSignature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text.
     * array of \TelegramBot\Api\Types\MessageEntity
     *
     * @var MessageEntity[]
     */
    protected $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     *
     * @var MessageEntity[]
     */
    protected $captionEntities;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var Audio
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var Document
     */
    protected $document;

    /**
     * Optional. Message is an animation, information about the animation.
     * For backward compatibility, when this field is set, the document field will also be set
     *
     * @var Animation
     */
    protected $animation;

    /**
     * Optional. Message is a game, information about the game.
     *
     * @var Game
     */
    protected $game;

    /**
     * Optional. Message is a photo, available sizes of the photo
     *
     * @var PhotoSize[]
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var Sticker
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var Video
     */
    protected $video;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var Voice
     */
    protected $voice;

    /**
     * Optional. Message is a video note, information about the video message
     *
     * @var VoiceNote
     */
    protected $voiceNote;

    /**
     * Optional. Caption for the audio, document, photo, video or voice, 0-200 characters
     *
     * @var string
     */
    protected $caption;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var Contact
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var Location
     */
    protected $location;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var Venue
     */
    protected $venue;

    /**
     * Optional. A new member was added to the group, information about them (this member may be bot itself)
     *
     * @var User
     */
    protected $newChatMember;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var User
     */
    protected $leftChatMember;

    /**
     * Optional. A group title was changed to this value
     *
     * @var string
     */
    protected $newChatTitle;

    /**
     * Optional. A group photo was change to this value
     *
     * @var PhotoSize[]
     */
    protected $newChatPhoto;

    /**
     * Optional. Informs that the group photo was deleted
     *
     * @var bool
     */
    protected $deleteChatPhoto;

    /**
     * Optional. Informs that the group has been created
     *
     * @var bool
     */
    protected $groupChatCreated;

    /**
     * Optional. Service message: the supergroup has been created
     *
     * @var bool
     */
    protected $superGroupChatCreated;

    /**
     * Optional. Service message: the channel has been created
     *
     * @var bool
     */
    protected $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier,
     * not exceeding 1e13 by absolute value
     *
     * @var int
     */
    protected $migrateFromChatId;

    /**
     * Optional. Specified message was pinned.Note that the Message object in this field
     * will not contain further reply_to_message fields even if it is itself a reply.
     *
     * @var Message
     */
    protected $pinnedMessage;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice.
     *
     * @var Invoice
     */
    protected $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment.
     *
     * @var SuccessfulPayment
     */
    protected $successfulPayment;

    /**
     * Optional. The domain name of the website on which the user has logged in.
     *
     * @var string
     */
    protected $connectedWebsite;

    /**
     * Optional. Telegram Passport data
     *
     * @var PassportData
     */
    protected $passportData;

    // ########################################

    /**
     * Message constructor.
     *
     * @param int                                   $messageId
     * @param \DateTime                             $date
     * @param \App\Service\Telegram\Model\Type\Chat $chat
     */
    public function __construct(
        int $messageId,
        \DateTime $date,
        \App\Service\Telegram\Model\Type\Chat $chat
    ) {
        $this->messageId             = $messageId;
        $this->date                  = $date;
        $this->chat                  = $chat;
    }

    // ########################################

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     */
    public function setMessageId(int $messageId): void
    {
        $this->messageId = $messageId;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getFrom(): \App\Service\Telegram\Model\Type\User
    {
        return $this->from;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\User $from
     */
    public function setFrom(\App\Service\Telegram\Model\Type\User $from): void
    {
        $this->from = $from;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate(\DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Chat
     */
    public function getChat(): \App\Service\Telegram\Model\Type\Chat
    {
        return $this->chat;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Chat $chat
     */
    public function setChat(\App\Service\Telegram\Model\Type\Chat $chat): void
    {
        $this->chat = $chat;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getForwardFrom(): \App\Service\Telegram\Model\Type\User
    {
        return $this->forwardFrom;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\User $forwardFrom
     */
    public function setForwardFrom(\App\Service\Telegram\Model\Type\User $forwardFrom): void
    {
        $this->forwardFrom = $forwardFrom;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Chat
     */
    public function getForwardFromChat(): \App\Service\Telegram\Model\Type\Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Chat $forwardFromChat
     */
    public function setForwardFromChat(\App\Service\Telegram\Model\Type\Chat $forwardFromChat): void
    {
        $this->forwardFromChat = $forwardFromChat;
    }

    /**
     * @return int
     */
    public function getForwardFromMessageId(): int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param int $forwardFromMessageId
     */
    public function setForwardFromMessageId(int $forwardFromMessageId): void
    {
        $this->forwardFromMessageId = $forwardFromMessageId;
    }

    /**
     * @return string
     */
    public function getForwardSignature(): string
    {
        return $this->forwardSignature;
    }

    /**
     * @param string $forwardSignature
     */
    public function setForwardSignature(string $forwardSignature): void
    {
        $this->forwardSignature = $forwardSignature;
    }

    /**
     * @return \DateTime
     */
    public function getForwardDate(): \DateTime
    {
        return $this->forwardDate;
    }

    /**
     * @param \DateTime $forwardDate
     */
    public function setForwardDate(\DateTime $forwardDate): void
    {
        $this->forwardDate = $forwardDate;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getReplyToMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Message $replyToMessage
     */
    public function setReplyToMessage(\App\Service\Telegram\Model\Type\Message $replyToMessage): void
    {
        $this->replyToMessage = $replyToMessage;
    }

    /**
     * @return \DateTime
     */
    public function getEditDate(): \DateTime
    {
        return $this->editDate;
    }

    /**
     * @param \DateTime $editDate
     */
    public function setEditDate(\DateTime $editDate): void
    {
        $this->editDate = $editDate;
    }

    /**
     * @return int
     */
    public function getMediaGroupId(): int
    {
        return $this->mediaGroupId;
    }

    /**
     * @param int $mediaGroupId
     */
    public function setMediaGroupId(int $mediaGroupId): void
    {
        $this->mediaGroupId = $mediaGroupId;
    }

    /**
     * @return string
     */
    public function getAuthorSignature(): string
    {
        return $this->authorSignature;
    }

    /**
     * @param string $authorSignature
     */
    public function setAuthorSignature(string $authorSignature): void
    {
        $this->authorSignature = $authorSignature;
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

    /**
     * @return \App\Service\Telegram\Model\Type\MessageEntity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\MessageEntity[] $entities
     */
    public function setEntities(array $entities): void
    {
        $this->entities = $entities;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\MessageEntity[]
     */
    public function getCaptionEntities(): array
    {
        return $this->captionEntities;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\MessageEntity[] $captionEntities
     */
    public function setCaptionEntities(array $captionEntities): void
    {
        $this->captionEntities = $captionEntities;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Audio
     */
    public function getAudio(): \App\Service\Telegram\Model\Type\Audio
    {
        return $this->audio;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Audio $audio
     */
    public function setAudio(\App\Service\Telegram\Model\Type\Audio $audio): void
    {
        $this->audio = $audio;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Document
     */
    public function getDocument(): \App\Service\Telegram\Model\Type\Document
    {
        return $this->document;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Document $document
     */
    public function setDocument(\App\Service\Telegram\Model\Type\Document $document): void
    {
        $this->document = $document;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Animation
     */
    public function getAnimation(): \App\Service\Telegram\Model\Type\Animation
    {
        return $this->animation;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Animation $animation
     */
    public function setAnimation(\App\Service\Telegram\Model\Type\Animation $animation): void
    {
        $this->animation = $animation;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Game
     */
    public function getGame(): \App\Service\Telegram\Model\Type\Game
    {
        return $this->game;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Game $game
     */
    public function setGame(\App\Service\Telegram\Model\Type\Game $game): void
    {
        $this->game = $game;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\PhotoSize[] $photo
     */
    public function setPhoto(array $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Sticker
     */
    public function getSticker(): \App\Service\Telegram\Model\Type\Sticker
    {
        return $this->sticker;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Sticker $sticker
     */
    public function setSticker(\App\Service\Telegram\Model\Type\Sticker $sticker): void
    {
        $this->sticker = $sticker;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Video
     */
    public function getVideo(): \App\Service\Telegram\Model\Type\Video
    {
        return $this->video;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Video $video
     */
    public function setVideo(\App\Service\Telegram\Model\Type\Video $video): void
    {
        $this->video = $video;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Voice
     */
    public function getVoice(): \App\Service\Telegram\Model\Type\Voice
    {
        return $this->voice;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Voice $voice
     */
    public function setVoice(\App\Service\Telegram\Model\Type\Voice $voice): void
    {
        $this->voice = $voice;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\VoiceNote
     */
    public function getVoiceNote(): \App\Service\Telegram\Model\Type\VoiceNote
    {
        return $this->voiceNote;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\VoiceNote $voiceNote
     */
    public function setVoiceNote(\App\Service\Telegram\Model\Type\VoiceNote $voiceNote): void
    {
        $this->voiceNote = $voiceNote;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     */
    public function setCaption(string $caption): void
    {
        $this->caption = $caption;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Contact
     */
    public function getContact(): \App\Service\Telegram\Model\Type\Contact
    {
        return $this->contact;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Contact $contact
     */
    public function setContact(\App\Service\Telegram\Model\Type\Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Location
     */
    public function getLocation(): \App\Service\Telegram\Model\Type\Location
    {
        return $this->location;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Location $location
     */
    public function setLocation(\App\Service\Telegram\Model\Type\Location $location): void
    {
        $this->location = $location;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Venue
     */
    public function getVenue(): \App\Service\Telegram\Model\Type\Venue
    {
        return $this->venue;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Venue $venue
     */
    public function setVenue(\App\Service\Telegram\Model\Type\Venue $venue): void
    {
        $this->venue = $venue;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getNewChatMember(): \App\Service\Telegram\Model\Type\User
    {
        return $this->newChatMember;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\User $newChatMember
     */
    public function setNewChatMember(\App\Service\Telegram\Model\Type\User $newChatMember): void
    {
        $this->newChatMember = $newChatMember;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getLeftChatMember(): \App\Service\Telegram\Model\Type\User
    {
        return $this->leftChatMember;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\User $leftChatMember
     */
    public function setLeftChatMember(\App\Service\Telegram\Model\Type\User $leftChatMember): void
    {
        $this->leftChatMember = $leftChatMember;
    }

    /**
     * @return string
     */
    public function getNewChatTitle(): string
    {
        return $this->newChatTitle;
    }

    /**
     * @param string $newChatTitle
     */
    public function setNewChatTitle(string $newChatTitle): void
    {
        $this->newChatTitle = $newChatTitle;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\PhotoSize[]
     */
    public function getNewChatPhoto(): array
    {
        return $this->newChatPhoto;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\PhotoSize[] $newChatPhoto
     */
    public function setNewChatPhoto(array $newChatPhoto): void
    {
        $this->newChatPhoto = $newChatPhoto;
    }

    /**
     * @return bool
     */
    public function isDeleteChatPhoto(): bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param bool $deleteChatPhoto
     */
    public function setDeleteChatPhoto(bool $deleteChatPhoto): void
    {
        $this->deleteChatPhoto = $deleteChatPhoto;
    }

    /**
     * @return bool
     */
    public function isGroupChatCreated(): bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @param bool $groupChatCreated
     */
    public function setGroupChatCreated(bool $groupChatCreated): void
    {
        $this->groupChatCreated = $groupChatCreated;
    }

    /**
     * @return bool
     */
    public function isSuperGroupChatCreated(): bool
    {
        return $this->superGroupChatCreated;
    }

    /**
     * @param bool $superGroupChatCreated
     */
    public function setSuperGroupChatCreated(bool $superGroupChatCreated): void
    {
        $this->superGroupChatCreated = $superGroupChatCreated;
    }

    /**
     * @return bool
     */
    public function isChannelChatCreated(): bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @param bool $channelChatCreated
     */
    public function setChannelChatCreated(bool $channelChatCreated): void
    {
        $this->channelChatCreated = $channelChatCreated;
    }

    /**
     * @return int
     */
    public function getMigrateToChatId(): int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $migrateToChatId
     */
    public function setMigrateToChatId(int $migrateToChatId): void
    {
        $this->migrateToChatId = $migrateToChatId;
    }

    /**
     * @return int
     */
    public function getMigrateFromChatId(): int
    {
        return $this->migrateFromChatId;
    }

    /**
     * @param int $migrateFromChatId
     */
    public function setMigrateFromChatId(int $migrateFromChatId): void
    {
        $this->migrateFromChatId = $migrateFromChatId;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getPinnedMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Message $pinnedMessage
     */
    public function setPinnedMessage(\App\Service\Telegram\Model\Type\Message $pinnedMessage): void
    {
        $this->pinnedMessage = $pinnedMessage;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Invoice
     */
    public function getInvoice(): \App\Service\Telegram\Model\Type\Invoice
    {
        return $this->invoice;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\Invoice $invoice
     */
    public function setInvoice(\App\Service\Telegram\Model\Type\Invoice $invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\SuccessfulPayment
     */
    public function getSuccessfulPayment(): \App\Service\Telegram\Model\Type\SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\SuccessfulPayment $successfulPayment
     */
    public function setSuccessfulPayment(\App\Service\Telegram\Model\Type\SuccessfulPayment $successfulPayment): void
    {
        $this->successfulPayment = $successfulPayment;
    }

    /**
     * @return string
     */
    public function getConnectedWebsite(): string
    {
        return $this->connectedWebsite;
    }

    /**
     * @param string $connectedWebsite
     */
    public function setConnectedWebsite(string $connectedWebsite): void
    {
        $this->connectedWebsite = $connectedWebsite;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\PassportData
     */
    public function getPassportData(): \App\Service\Telegram\Model\Type\PassportData
    {
        return $this->passportData;
    }

    /**
     * @param \App\Service\Telegram\Model\Type\PassportData $passportData
     */
    public function setPassportData(\App\Service\Telegram\Model\Type\PassportData $passportData): void
    {
        $this->passportData = $passportData;
    }

    // ########################################
}
