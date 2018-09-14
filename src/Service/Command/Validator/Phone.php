<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command\Validator;

use App\Model\Command\Validator\BaseInterface;

class Phone implements BaseInterface
{
    // ########################################

    public function validate($param)
    {
        return true;
    }

    // ########################################

}
