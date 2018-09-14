<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Telegram\Command\Response;

use App\Service\Telegram\Command\Response;

class Factory
{
    // ########################################

    /**
     * @param bool $isSuccess
     *
     * @return \App\Service\Telegram\Command\Response
     */
    public function create(bool $isSuccess)
    {
        return new Response($isSuccess);
    }

    // ########################################
}
