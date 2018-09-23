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

    /**
     * @var \App\Service\Telegram\Model\Type\Update\CallbackQuery\Factory
     */
    private $callbackQueryFactory;

    // ########################################

    public function __construct(MessageUpdate\Factory $messageUpdateFactory, CallbackQuery\Factory $callbackQueryFactory)
    {
        $this->messageUpdateFactory = $messageUpdateFactory;
        $this->callbackQueryFactory = $callbackQueryFactory;
    }

    // ########################################

    public function resolve(array $data)
    {
        if (!empty($data['message'])) {
            return $this->messageUpdateFactory->create($data);
        } elseif (!empty($data['callback_query'])) {
            return $this->callbackQueryFactory->create($data);
        }

        //todo other

        return null;
    }

    // ########################################
}
