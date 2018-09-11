<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command\Message;

class Start_v1 extends \App\Service\Telegram\Command\BaseAbstract
{
    /** @var \App\Service\Telegram\Model\Methods\Send\Message\Factory */
    private $sendMessageFactory = null;

    // ########################################

    public function __construct(\App\Service\Telegram\Model\Methods\Send\Message\Factory $sendMessageFactory)
    {
        $this->sendMessageFactory = $sendMessageFactory;
    }

    // ########################################

    public function process(): string
    {
        $sendMessageModel = $this->sendMessageFactory->create($this->getUser()->getChatId(), 'Hello');
        $sendMessageModel->send();

        /*$result = $this->makeJsonRequest('sendMessage', [
            'chat_id'      => $this->getUser()->getChatId(),
            'text'         => 'Зарегаться',
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        ['text' => 'Зарегаться', 'callback_data' => '{"message": {"chat": {"first_name": "Alexander"}}'],
                    ],
                ]
            ]
        ]);*/

        return '';
    }

    // ########################################
}
