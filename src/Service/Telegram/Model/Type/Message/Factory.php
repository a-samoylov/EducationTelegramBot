<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Message;

use App\Service\Model\ValidateException;
use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Message;

class Factory implements FactoryInterface
{
    // ########################################

    /**
     * @var \App\Service\Telegram\Model\Type\User\Factory
     */
    private $userFactory;

    /**
     * @var \App\Service\Telegram\Model\Type\Chat\Factory
     */
    private $chatFactory;

    /**
     * @var \App\Service\Telegram\Model\Helper\DateTime
     */
    private $dateTimeHelper;

    public function __construct(
        \App\Service\Telegram\Model\Type\User\Factory $userFactory,
        \App\Service\Telegram\Model\Type\Chat\Factory $chatFactory,
        \App\Service\Telegram\Model\Helper\DateTime $dateTimeHelper
    ) {
        $this->userFactory = $userFactory;
        $this->chatFactory = $chatFactory;
        $this->dateTimeHelper = $dateTimeHelper;
    }

    // ########################################

    public function create(array $data): Message
    {
        if (empty($data['message_id']) || !is_int($data['message_id'])) {
            throw new ValidateException(self::class, 'message_id');
        }

        $from = null;
        if (!empty($data['from'])) {
            $from = $this->userFactory->create($data['from']);
        }

        if (empty($data['date']) || !is_int($data['date'])) {
            throw new ValidateException(self::class, 'date');
        }

        if (empty($data['chat'])) {
            throw new ValidateException(self::class, 'chat');
        }

        $forwardFrom = null;
        if (!empty($data['forward_from'])) {
            $forwardFrom = $this->userFactory->create($data['forward_from']);
        }

        $forwardFromChat = null;
        if (!empty($data['forward_from_chat'])) {
            $forwardFromChat = $this->chatFactory->create($data['forward_from_chat']);
        }

        $forwardFromMessageId = null;
        if (!empty($data['forward_from_message_id'])) {
            if (!is_int($data['forward_from_message_id'])) {
                throw new ValidateException(self::class, 'forward_from_message_id');
            }
            $forwardFromMessageId = $data['forward_from_message_id'];
        }

        $forwardSignature = null;
        if (!empty($data['forward_signature'])) {
            if (!is_string($data['forward_signature'])) {
                throw new ValidateException(self::class, 'forward_signature');
            }
            $forwardSignature = $data['forward_signature'];
        }

        $forwardDate = null;
        if (!empty($data['forward_date'])) {
            if (!is_int($data['forward_date'])) {
                throw new ValidateException(self::class, 'forward_date');
            }
            $forwardDate = $this->dateTimeHelper->create($data['forward_date']);
        }

        $replyToMessage = null;
        if (!empty($data['reply_to_message'])) {
            $replyToMessage = $this->create($data['reply_to_message']);
        }

        $editDate = null;
        if (!empty($data['edit_date'])) {
            if (!is_int($data['edit_date'])) {
                throw new ValidateException(self::class, 'edit_date');
            }
            $editDate = $data['edit_date'];
        }

        $mediaGroupId = null;
        if (!empty($data['media_group_id'])) {
            if (!is_string($data['media_group_id'])) {
                throw new ValidateException(self::class, 'media_group_id');
            }
            $mediaGroupId = $data['media_group_id'];
        }

        $authorSignature = null;
        if (!empty($data['author_signature'])) {
            if (!is_string($data['author_signature'])) {
                throw new ValidateException(self::class, 'author_signature');
            }
            $authorSignature = $data['author_signature'];
        }

        $text = null;
        if (!empty($data['text'])) {
            if (!is_string($data['text'])) {
                throw new ValidateException(self::class, 'text');
            }
            $text = $data['text'];
        }

        //TODO
        $entities              = null;
        $captionEntities       = null;
        $audio                 = null;
        $document              = null;
        $animation             = null;
        $game                  = null;
        $photo                 = null;
        $sticker               = null;
        $video                 = null;
        $voice                 = null;
        $voiceNote             = null;
        $caption               = null;
        $contact               = null;
        $location              = null;
        $venue                 = null;
        $newChatMember         = null;
        $leftChatMember        = null;
        $newChatTitle          = null;
        $newChatPhoto          = null;
        $deleteChatPhoto       = null;
        $groupChatCreated      = null;
        $superGroupChatCreated = null;
        $channelChatCreated    = null;
        $migrateToChatId       = null;
        $migrateFromChatId     = null;
        $pinnedMessage         = null;
        $invoice               = null;
        $successfulPayment     = null;
        $connectedWebsite      = null;
        $passportData          = null;

        return new Message(
            $data['message_id'],
            $this->dateTimeHelper->create($data['date']),
            $this->chatFactory->create($data['chat']),
            $from,
            $forwardFrom,
            $forwardFromChat,
            $forwardFromMessageId,
            $forwardSignature,
            $forwardDate,
            $replyToMessage,
            $editDate,
            $mediaGroupId,
            $authorSignature,
            $text,
            $entities,
            $captionEntities,
            $audio,
            $document,
            $animation,
            $game,
            $photo,
            $sticker,
            $video,
            $voice,
            $voiceNote,
            $caption,
            $contact,
            $location,
            $venue,
            $newChatMember,
            $leftChatMember,
            $newChatTitle,
            $newChatPhoto,
            $deleteChatPhoto,
            $groupChatCreated,
            $superGroupChatCreated,
            $channelChatCreated,
            $migrateToChatId,
            $migrateFromChatId,
            $pinnedMessage,
            $invoice,
            $successfulPayment,
            $connectedWebsite,
            $passportData
        );
    }

    // ########################################
}
