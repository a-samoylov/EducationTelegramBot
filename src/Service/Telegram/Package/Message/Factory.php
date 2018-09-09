<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Package\Message;

use App\Service\Model\ValidateException;

class Factory
{
    // ########################################

    public function create(array $data)
    {
        if (empty($data)) {
            throw new ValidateException('Empty input params');
        }

        if (!isset($data['update_id'])) {
            throw new ValidateException('Invalid input param "update_id"', $data);
        }

        if (!isset($data['message']) && !is_array($data['message'])) {
            throw new ValidateException('Invalid input param "message"', $data);
        }

        $message = $data['message'];
        if (!isset($message['message_id']) && !is_int($message['message_id'])) {
            throw new ValidateException('Invalid input param "message_id"', $data);
        }

        if (!isset($message['text']) && !is_string($message['text'])) {
            throw new ValidateException('Invalid input param "text"', $data);
        }

        if (!isset($message['date']) && !is_int($message['date'])) {
            throw new ValidateException('Invalid input param "date"', $data);
        }
        $dateTime = (new \DateTime('now', new \DateTimeZone('UTC')))->setTimestamp($message['date']);

        if (!isset($message['from']) && !is_array($message['from'])) {
            throw new ValidateException('Invalid input param "from"', $data);
        }

        if (!isset($message['chat']) && !is_array($message['chat'])) {
            throw new ValidateException('Invalid input param "chat"', $data);
        }

        //TODO validate $fromData and $chatData
        $fromData = $message['from'];
        $chatData = $message['chat'];

        $userData = new Entity\UserData(
            $chatData['id'],
            $fromData['first_name'],
            $fromData['last_name'],
            $fromData['is_bot'],
            $chatData['type'],
            $fromData['language_code']
        );

        return new Entity(
            $data['update_id'],
            $message['message_id'],
            $dateTime,
            $message['text'],
            $userData
        );
    }

    // ########################################
}
