<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Auth;

class Factory
{
    // ########################################

    public function create()
    {
        //Todo get token from config

        $accessToken = '123';

        return new Checker($accessToken);
    }

    // ########################################
}
