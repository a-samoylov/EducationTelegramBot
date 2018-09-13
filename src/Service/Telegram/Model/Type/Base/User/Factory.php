<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\Base\User;

use App\Model\Exception\Validate as ValidateException;
use App\Service\Telegram\Model\Type\FactoryInterface;

class Factory implements FactoryInterface
{
    // ########################################

    public function create(array $data): \App\Service\Telegram\Model\Type\Base\User
    {
        //todo validation

        $lastName = null;
        if (!empty($data['last_name'])) {
            if (!is_string($data['last_name'])) {
                throw new ValidateException(self::class, 'last_name');
            }
            $lastName = $data['last_name'];
        }

        $username = null;
        if (!empty($data['username'])) {
            if (!is_string($data['username'])) {
                throw new ValidateException(self::class, 'username');
            }
            $username = $data['username'];
        }

        $languageCode = null;
        if (!empty($data['language_code'])) {
            if (!is_string($data['language_code'])) {
                throw new ValidateException(self::class, 'language_code');
            }
            $languageCode = $data['language_code'];
        }

        return new \App\Service\Telegram\Model\Type\Base\User(
            $data['id'],
            $data['is_bot'],
            $data['first_name'],
            $lastName,
            $username,
            $languageCode
        );
    }

    // ########################################
}
