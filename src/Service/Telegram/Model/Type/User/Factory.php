<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Model\Type\User;

use App\Service\Telegram\Model\Type\User;
use App\Service\Telegram\Model\Type\FactoryInterface;

class Factory implements FactoryInterface
{
    // ########################################

    public function create(array $data): User
    {
        return new User(
            $data['id'],
            $data['is_bot'],
            $data['first_name'],
            $data['last_name'],
            $data['username'],
            $data['language_code']
        );
    }

    // ########################################
}
