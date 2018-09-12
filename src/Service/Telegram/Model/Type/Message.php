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
     * @var \TelegramBot\Api\Types\User
     */
    protected $from;

    /**
     * Date the message was sent in Unix time
     *
     * @var int
     */
    protected $date;

    /**
     * Conversation the message belongs to — user in case of a private message, GroupChat in case of a group
     *
     * @var \TelegramBot\Api\Types\Chat
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $forwardFrom;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time
     *
     * @var int
     */
    protected $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further
     * reply_to_message fields even if it itself is a reply.
     *
     * @var \TelegramBot\Api\Types\Message
     */
    protected $replyToMessage;

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
     * @var array
     */
    protected $entities;

    /**
     * Optional. Message is an audio file, information about the file
     *
     * @var \TelegramBot\Api\Types\Audio
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file
     *
     * @var \TelegramBot\Api\Types\Document
     */
    protected $document;

    /**
     * Optional. Message is a photo, available sizes of the photo
     * array of \TelegramBot\Api\Types\Photo
     *
     * @var array
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker
     *
     * @var \TelegramBot\Api\Types\Sticker
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video
     *
     * @var \TelegramBot\Api\Types\Video
     */
    protected $video;

    /**
     * Optional. Message is a voice message, information about the file
     *
     * @var \TelegramBot\Api\Types\Voice
     */
    protected $voice;

    /**
     * Optional. Message is a shared contact, information about the contact
     *
     * @var \TelegramBot\Api\Types\Contact
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location
     *
     * @var \TelegramBot\Api\Types\Location
     */
    protected $location;

    /**
     * Optional. Message is a venue, information about the venue
     *
     * @var \TelegramBot\Api\Types\Venue
     */
    protected $venue;

    /**
     * Optional. A new member was added to the group, information about them (this member may be bot itself)
     *
     * @var \TelegramBot\Api\Types\User
     */
    protected $newChatMember;

    /**
     * Optional. A member was removed from the group, information about them (this member may be bot itself)
     *
     * @var \TelegramBot\Api\Types\User
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
     * @var mixed
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
     * Optional. Text description of the video (usually empty)
     *
     * @var string
     */
    protected $caption;


    /**
     * Optional. Service message: the supergroup has been created
     *
     * @var bool
     */
    protected $supergroupChatCreated;

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
     * Optional. For messages forwarded from channels, signature of the post author if present
     *
     * @var string
     */
    protected $forwardSignature;

    /**
     * Optional. Signature of the post author for messages in channels
     *
     * @var string
     */
    protected $authorSignature;

    /**
     * Optional. For messages with a caption, special entities like usernames,
     * URLs, bot commands, etc. that appear in the caption
     *
     * @var ArrayOfMessageEntity
     */
    protected $captionEntities;

    /**
     * Optional. The domain name of the website on which the user has logged in.
     *
     * @var string
     */
    protected $connectedWebsite;

    // ########################################
    // ########################################
}
