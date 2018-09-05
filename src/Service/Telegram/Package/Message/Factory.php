<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Package\Message;

class Factory
{
    // ########################################

    public function create(array $data)
    {
        if(isset($data[''])) {
            throw new \Exception('Invalid input params');
        }

        //todo


    }

    // ########################################
}
