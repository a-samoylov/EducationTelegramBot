<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update\MessageUpdate;

use App\Service\Model\Exception\Validate as ValidateException;
use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Update\MessageUpdate;
use App\Service\Telegram\Model\Type\Base\Message\Factory as MessageFactory;

class Factory implements FactoryInterface
{
    // ########################################

    /**
     * @var \App\Service\Telegram\Model\Type\Base\Message\Factory
     */
    private $messageFactory;

    // ########################################

    public function __construct(MessageFactory $messageFactory)
    {
        $this->messageFactory = $messageFactory;
    }

    // ########################################

    public function create(array $data): MessageUpdate
    {
        if (empty($data['update_id']) && is_int($data['update_id'])) {
            throw new ValidateException(self::class, 'update_id');
        }

        return new MessageUpdate(
            $data['update_id'],
            $this->messageFactory->create($data['message'])
        );
    }

    // ########################################
}
