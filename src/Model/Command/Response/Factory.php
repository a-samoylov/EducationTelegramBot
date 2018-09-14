<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Model\Command\Response;

use App\Model\Command\Response;

class Factory
{
    // ########################################

    /**
     * @param bool $isSuccess
     *
     * @return \App\Model\Command\Response
     */
    public function create(bool $isSuccess)
    {
        return new Response($isSuccess);
    }

    // ########################################
}
