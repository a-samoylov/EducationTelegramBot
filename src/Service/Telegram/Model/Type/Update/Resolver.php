<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Update;

class Resolver
{
    /**
     * @var \App\Service\Telegram\Model\Type\Update\MessageUpdate\Factory
     */
    private $messageUpdateFactory;

    // ########################################

    public function __construct(MessageUpdate\Factory $messageUpdateFactory)
    {
        $this->messageUpdateFactory = $messageUpdateFactory;
    }

    // ########################################

    public function resolve(array $data)
    {
        if (!empty($data['message'])) {
            return $this->messageUpdateFactory->create($data);
        }

        //todo other

        return null;
    }

    // ########################################
}
