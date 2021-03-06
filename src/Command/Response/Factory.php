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
     * @param bool   $isSuccess
     *
     * @param string $message
     *
     * @return \App\Command\Response
     */
    public function create(bool $isSuccess = true, string $message = 'Success'): Response
    {
        return new Response($isSuccess, $message);
    }

    // ########################################
}
