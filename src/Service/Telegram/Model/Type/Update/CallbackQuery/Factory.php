<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update\CallbackQuery;

use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Update\CallbackQuery;
use App\Model\Exception\Validate as ValidateException;
use App\Service\Telegram\Model\Type\Base\Message\Factory as MessageFactory;
use App\Service\Telegram\Model\Type\Base\User\Factory as UserFactory;

class Factory implements FactoryInterface
{

    // ########################################

    /**
     * @var \App\Service\Telegram\Model\Type\Base\Message\Factory
     */
    private $messageFactory;

    /**
     * @var \App\Service\Telegram\Model\Type\Base\User\Factory
     */
    private $userFactory;

    // ########################################

    public function __construct(MessageFactory $messageFactory, UserFactory $userFactory)
    {
        $this->messageFactory = $messageFactory;
        $this->userFactory    = $userFactory;
    }

    // ########################################

    public function create(array $data): CallbackQuery
    {
        if (empty($data['update_id']) && is_int($data['update_id'])) {
            throw new ValidateException(self::class, 'update_id');
        }

        if (empty($data['callback_query']) && !is_array($data['callback_query'])) {
            throw new ValidateException(self::class, 'callback_query');
        }

        $callbackQueryData = $data['callback_query'];
        if (empty($callbackQueryData['id']) && !is_string($callbackQueryData['id'])) {
            throw new ValidateException(self::class, 'id');
        }

        if (empty($callbackQueryData['chat_instance']) && !is_string($callbackQueryData['chat_instance'])) {
            throw new ValidateException(self::class, 'chat_instance');
        }

        $result = new CallbackQuery($callbackQueryData['id'], $this->userFactory->create($callbackQueryData['from']), $callbackQueryData['chat_instance']);

        if (!empty($callbackQueryData['data'])) {
            if (!is_string($callbackQueryData['data'])) {
                throw new ValidateException(self::class, 'data');
            }
            $result->setData($callbackQueryData['data']);
        }

        !empty($callbackQueryData['message']) && $result->setMessage($this->messageFactory->create($callbackQueryData['message']));

        return $result;
    }

    // ########################################
}
