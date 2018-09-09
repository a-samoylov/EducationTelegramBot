<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command\Message;

class Start_v1 extends \App\Service\Telegram\Command\BaseAbstract
{
    // ########################################

    public function process()
    {
        //todo сделать модель sendMessage
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
    }

    // ########################################
}
