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
     * @param int                                                $messageId
     * @param \App\Service\Telegram\Model\Type\User              $from
     * @param \DateTime                                          $date
     * @param \App\Service\Telegram\Model\Type\Chat              $chat
     * @param \App\Service\Telegram\Model\Type\User              $forwardFrom
     * @param \App\Service\Telegram\Model\Type\Chat              $forwardFromChat
     * @param int                                                $forwardFromMessageId
     * @param string                                             $forwardSignature
     * @param \DateTime                                          $forwardDate
     * @param \App\Service\Telegram\Model\Type\Message           $replyToMessage
     * @param \DateTime                                          $editDate
     * @param int                                                $mediaGroupId
     * @param string                                             $authorSignature
     * @param string                                             $text
     * @param \App\Service\Telegram\Model\Type\MessageEntity[]   $entities
     * @param \App\Service\Telegram\Model\Type\MessageEntity[]   $captionEntities
     * @param \App\Service\Telegram\Model\Type\Audio             $audio
     * @param \App\Service\Telegram\Model\Type\Document          $document
     * @param \App\Service\Telegram\Model\Type\Animation         $animation
     * @param \App\Service\Telegram\Model\Type\Game              $game
     * @param \App\Service\Telegram\Model\Type\PhotoSize[]       $photo
     * @param \App\Service\Telegram\Model\Type\Sticker           $sticker
     * @param \App\Service\Telegram\Model\Type\Video             $video
     * @param \App\Service\Telegram\Model\Type\Voice             $voice
     * @param \App\Service\Telegram\Model\Type\VoiceNote         $voiceNote
     * @param string                                             $caption
     * @param \App\Service\Telegram\Model\Type\Contact           $contact
     * @param \App\Service\Telegram\Model\Type\Location          $location
     * @param \App\Service\Telegram\Model\Type\Venue             $venue
     * @param \App\Service\Telegram\Model\Type\User              $newChatMember
     * @param \App\Service\Telegram\Model\Type\User              $leftChatMember
     * @param string                                             $newChatTitle
     * @param \App\Service\Telegram\Model\Type\PhotoSize[]       $newChatPhoto
     * @param bool                                               $deleteChatPhoto
     * @param bool                                               $groupChatCreated
     * @param bool                                               $superGroupChatCreated
     * @param bool                                               $channelChatCreated
     * @param int                                                $migrateToChatId
     * @param int                                                $migrateFromChatId
     * @param \App\Service\Telegram\Model\Type\Message           $pinnedMessage
     * @param \App\Service\Telegram\Model\Type\Invoice           $invoice
     * @param \App\Service\Telegram\Model\Type\SuccessfulPayment $successfulPayment
     * @param string                                             $connectedWebsite
     * @param \App\Service\Telegram\Model\Type\PassportData      $passportData
     */
    public function __construct(
        int $messageId,
        \DateTime $date,
        \App\Service\Telegram\Model\Type\Chat $chat,
        \App\Service\Telegram\Model\Type\User $from = null,
        \App\Service\Telegram\Model\Type\User $forwardFrom = null,
        \App\Service\Telegram\Model\Type\Chat $forwardFromChat = null,
        int $forwardFromMessageId = null,
        string $forwardSignature = null,
        \DateTime $forwardDate = null,
        \App\Service\Telegram\Model\Type\Message $replyToMessage = null,
        \DateTime $editDate = null,
        int $mediaGroupId = null,
        string $authorSignature = null,
        string $text = null,
        array $entities = null,
        array $captionEntities = null,
        \App\Service\Telegram\Model\Type\Audio $audio = null,
        \App\Service\Telegram\Model\Type\Document $document = null,
        \App\Service\Telegram\Model\Type\Animation $animation = null,
        \App\Service\Telegram\Model\Type\Game $game = null,
        array $photo = null,
        \App\Service\Telegram\Model\Type\Sticker $sticker = null,
        \App\Service\Telegram\Model\Type\Video $video = null,
        \App\Service\Telegram\Model\Type\Voice $voice = null,
        \App\Service\Telegram\Model\Type\VoiceNote $voiceNote = null,
        string $caption = null,
        \App\Service\Telegram\Model\Type\Contact $contact = null,
        \App\Service\Telegram\Model\Type\Location $location = null,
        \App\Service\Telegram\Model\Type\Venue $venue = null,
        \App\Service\Telegram\Model\Type\User $newChatMember = null,
        \App\Service\Telegram\Model\Type\User $leftChatMember = null,
        string $newChatTitle = null,
        array $newChatPhoto = null,
        bool $deleteChatPhoto = null,
        bool $groupChatCreated = null,
        bool $superGroupChatCreated = null,
        bool $channelChatCreated = null,
        int $migrateToChatId = null,
        int $migrateFromChatId = null,
        \App\Service\Telegram\Model\Type\Message $pinnedMessage = null,
        \App\Service\Telegram\Model\Type\Invoice $invoice = null,
        \App\Service\Telegram\Model\Type\SuccessfulPayment $successfulPayment = null,
        string $connectedWebsite = null,
        \App\Service\Telegram\Model\Type\PassportData $passportData = null
    ) {
        $this->messageId             = $messageId;
        $this->from                  = $from;
        $this->date                  = $date;
        $this->chat                  = $chat;
        $this->forwardFrom           = $forwardFrom;
        $this->forwardFromChat       = $forwardFromChat;
        $this->forwardFromMessageId  = $forwardFromMessageId;
        $this->forwardSignature      = $forwardSignature;
        $this->forwardDate           = $forwardDate;
        $this->replyToMessage        = $replyToMessage;
        $this->editDate              = $editDate;
        $this->mediaGroupId          = $mediaGroupId;
        $this->authorSignature       = $authorSignature;
        $this->text                  = $text;
        $this->entities              = $entities;
        $this->captionEntities       = $captionEntities;
        $this->audio                 = $audio;
        $this->document              = $document;
        $this->animation             = $animation;
        $this->game                  = $game;
        $this->photo                 = $photo;
        $this->sticker               = $sticker;
        $this->video                 = $video;
        $this->voice                 = $voice;
        $this->voiceNote             = $voiceNote;
        $this->caption               = $caption;
        $this->contact               = $contact;
        $this->location              = $location;
        $this->venue                 = $venue;
        $this->newChatMember         = $newChatMember;
        $this->leftChatMember        = $leftChatMember;
        $this->newChatTitle          = $newChatTitle;
        $this->newChatPhoto          = $newChatPhoto;
        $this->deleteChatPhoto       = $deleteChatPhoto;
        $this->groupChatCreated      = $groupChatCreated;
        $this->superGroupChatCreated = $superGroupChatCreated;
        $this->channelChatCreated    = $channelChatCreated;
        $this->migrateToChatId       = $migrateToChatId;
        $this->migrateFromChatId     = $migrateFromChatId;
        $this->pinnedMessage         = $pinnedMessage;
        $this->invoice               = $invoice;
        $this->successfulPayment     = $successfulPayment;
        $this->connectedWebsite      = $connectedWebsite;
        $this->passportData          = $passportData;
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
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getFrom(): \App\Service\Telegram\Model\Type\User
    {
        return $this->from;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Chat
     */
    public function getChat(): \App\Service\Telegram\Model\Type\Chat
    {
        return $this->chat;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getForwardFrom(): \App\Service\Telegram\Model\Type\User
    {
        return $this->forwardFrom;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Chat
     */
    public function getForwardFromChat(): \App\Service\Telegram\Model\Type\Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @return int
     */
    public function getForwardFromMessageId(): int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @return string
     */
    public function getForwardSignature(): string
    {
        return $this->forwardSignature;
    }

    /**
     * @return \DateTime
     */
    public function getForwardDate(): \DateTime
    {
        return $this->forwardDate;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getReplyToMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->replyToMessage;
    }

    /**
     * @return \DateTime
     */
    public function getEditDate(): \DateTime
    {
        return $this->editDate;
    }

    /**
     * @return int
     */
    public function getMediaGroupId(): int
    {
        return $this->mediaGroupId;
    }

    /**
     * @return string
     */
    public function getAuthorSignature(): string
    {
        return $this->authorSignature;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\MessageEntity[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\MessageEntity[]
     */
    public function getCaptionEntities(): array
    {
        return $this->captionEntities;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Audio
     */
    public function getAudio(): \App\Service\Telegram\Model\Type\Audio
    {
        return $this->audio;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Document
     */
    public function getDocument(): \App\Service\Telegram\Model\Type\Document
    {
        return $this->document;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Animation
     */
    public function getAnimation(): \App\Service\Telegram\Model\Type\Animation
    {
        return $this->animation;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Game
     */
    public function getGame(): \App\Service\Telegram\Model\Type\Game
    {
        return $this->game;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Sticker
     */
    public function getSticker(): \App\Service\Telegram\Model\Type\Sticker
    {
        return $this->sticker;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Video
     */
    public function getVideo(): \App\Service\Telegram\Model\Type\Video
    {
        return $this->video;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Voice
     */
    public function getVoice(): \App\Service\Telegram\Model\Type\Voice
    {
        return $this->voice;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\VoiceNote
     */
    public function getVoiceNote(): \App\Service\Telegram\Model\Type\VoiceNote
    {
        return $this->voiceNote;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Contact
     */
    public function getContact(): \App\Service\Telegram\Model\Type\Contact
    {
        return $this->contact;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Location
     */
    public function getLocation(): \App\Service\Telegram\Model\Type\Location
    {
        return $this->location;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Venue
     */
    public function getVenue(): \App\Service\Telegram\Model\Type\Venue
    {
        return $this->venue;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getNewChatMember(): \App\Service\Telegram\Model\Type\User
    {
        return $this->newChatMember;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\User
     */
    public function getLeftChatMember(): \App\Service\Telegram\Model\Type\User
    {
        return $this->leftChatMember;
    }

    /**
     * @return string
     */
    public function getNewChatTitle(): string
    {
        return $this->newChatTitle;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\PhotoSize[]
     */
    public function getNewChatPhoto(): array
    {
        return $this->newChatPhoto;
    }

    /**
     * @return bool
     */
    public function isDeleteChatPhoto(): bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @return bool
     */
    public function isGroupChatCreated(): bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @return bool
     */
    public function isSuperGroupChatCreated(): bool
    {
        return $this->superGroupChatCreated;
    }

    /**
     * @return bool
     */
    public function isChannelChatCreated(): bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @return int
     */
    public function getMigrateToChatId(): int
    {
        return $this->migrateToChatId;
    }

    /**
     * @return int
     */
    public function getMigrateFromChatId(): int
    {
        return $this->migrateFromChatId;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Message
     */
    public function getPinnedMessage(): \App\Service\Telegram\Model\Type\Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\Invoice
     */
    public function getInvoice(): \App\Service\Telegram\Model\Type\Invoice
    {
        return $this->invoice;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\SuccessfulPayment
     */
    public function getSuccessfulPayment(): \App\Service\Telegram\Model\Type\SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * @return string
     */
    public function getConnectedWebsite(): string
    {
        return $this->connectedWebsite;
    }

    /**
     * @return \App\Service\Telegram\Model\Type\PassportData
     */
    public function getPassportData(): \App\Service\Telegram\Model\Type\PassportData
    {
        return $this->passportData;
    }

    // ########################################
}
