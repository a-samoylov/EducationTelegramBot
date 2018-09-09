<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command\Message;

class Start_v1 implements \App\Service\Telegram\Command\BaseInterface
{
    // ########################################

    public function process()
    {
        return 'hello!';
    }

    // ########################################
}
