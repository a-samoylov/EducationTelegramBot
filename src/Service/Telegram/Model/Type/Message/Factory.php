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
     * @var \App\Service\Helper\DateTime
     */
    private $dateTimeHelper;

    public function __construct(
        \App\Service\Telegram\Model\Type\User\Factory $userFactory,
        \App\Service\Telegram\Model\Type\Chat\Factory $chatFactory,
        \App\Service\Helper\DateTime $dateTimeHelper
    ) {
        $this->userFactory    = $userFactory;
        $this->chatFactory    = $chatFactory;
        $this->dateTimeHelper = $dateTimeHelper;
    }

    // ########################################

    public function create(array $data): Message
    {
        if (empty($data['message_id']) || !is_int($data['message_id'])) {
            throw new ValidateException(self::class, 'message_id');
        }

        if (empty($data['date']) || !is_int($data['date'])) {
            throw new ValidateException(self::class, 'date');
        }

        if (empty($data['chat'])) {
            throw new ValidateException(self::class, 'chat');
        }

        $result = new Message(
            $data['message_id'],
            $this->dateTimeHelper->create($data['date']),
            $this->chatFactory->create($data['chat'])
        );

        if (!empty($data['from'])) {
            $result->setFrom($this->userFactory->create($data['from']));
        }

        if (!empty($data['forward_from'])) {
            $result->setForwardFrom($this->userFactory->create($data['forward_from']));
        }

        if (!empty($data['forward_from_chat'])) {
            $result->setForwardFromChat($this->chatFactory->create($data['forward_from_chat']));
        }

        if (!empty($data['forward_from_message_id'])) {
            if (!is_int($data['forward_from_message_id'])) {
                throw new ValidateException(self::class, 'forward_from_message_id');
            }
            $result->setForwardFromMessageId($data['forward_from_message_id']);
        }

        if (!empty($data['forward_signature'])) {
            if (!is_string($data['forward_signature'])) {
                throw new ValidateException(self::class, 'forward_signature');
            }
            $result->setForwardSignature($data['forward_signature']);
        }

        if (!empty($data['forward_date'])) {
            if (!is_int($data['forward_date'])) {
                throw new ValidateException(self::class, 'forward_date');
            }
            $result->setForwardDate($this->dateTimeHelper->create($data['forward_date']));
        }

        if (!empty($data['reply_to_message'])) {
            $result->setReplyToMessage($this->create($data['reply_to_message']));
        }

        if (!empty($data['edit_date'])) {
            if (!is_int($data['edit_date'])) {
                throw new ValidateException(self::class, 'edit_date');
            }
            $result->setEditDate($this->dateTimeHelper->create($data['edit_date']));
        }

        if (!empty($data['media_group_id'])) {
            if (!is_string($data['media_group_id'])) {
                throw new ValidateException(self::class, 'media_group_id');
            }
            $result->setMediaGroupId($data['media_group_id']);
        }

        if (!empty($data['author_signature'])) {
            if (!is_string($data['author_signature'])) {
                throw new ValidateException(self::class, 'author_signature');
            }
            $result->setAuthorSignature($data['author_signature']);
        }

        if (!empty($data['text'])) {
            if (!is_string($data['text'])) {
                throw new ValidateException(self::class, 'text');
            }
            $result->setText($data['text']);
        }

        return $result;
    }

    // ########################################
}
