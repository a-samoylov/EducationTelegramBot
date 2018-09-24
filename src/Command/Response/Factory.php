<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Response;

use App\Command\Response;

class Factory
{
    // ########################################

    /**
     * @param bool $isSuccess
     *
     * @return \App\Command\Response
     */
    public function create(bool $isSuccess): Response
    {
        return new Response($isSuccess);
    }

    // ########################################
}
