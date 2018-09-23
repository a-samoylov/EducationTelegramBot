<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command\Register;

use App\Model\Command\Response;
use App\Model\Command\Response\Factory as ResponseFactory;
use App\Model\Command\BaseAbstract;

class SubjectStep extends BaseAbstract
{
    // ########################################

    public function __construct(
        ResponseFactory $responseFactory
    ) {
        parent::__construct($responseFactory);
    }

    // ########################################

    public function process(): Response
    {
        return $this->createSuccessResponse();
    }

    // ########################################
}
