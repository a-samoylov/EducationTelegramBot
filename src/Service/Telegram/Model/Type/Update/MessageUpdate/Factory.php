<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update\MessageUpdate;

use App\Service\Telegram\Model\Type\FactoryInterface;
use App\Service\Telegram\Model\Type\Update\MessageUpdate;
use App\Service\Telegram\Model\Type\Message\Factory as MessageFactory;
use App\Service\Telegram\Model\Type\Update\MessageUpdate\Factory as MessageUpdateFactory;

class Factory implements FactoryInterface
{
    // ########################################

    /**
     * @var \App\Service\Telegram\Model\Type\Message\Factory
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
        return new MessageUpdate(
            $data['update_id'],
            $this->messageFactory->create($data['message'])
        );
    }

    // ########################################
}
