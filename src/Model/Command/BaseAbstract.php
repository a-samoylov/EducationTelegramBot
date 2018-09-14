<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Model\Command;

abstract class BaseAbstract
{
    // ########################################

    /**
     * @var \App\Model\Command\Response\Factory
     */
    private $responseFactory;

    public function __construct(Response\Factory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    // ########################################

    abstract public function process(): Response;

    // ########################################

    public function createSuccessResponse(): Response
    {
        return $this->responseFactory->create(true);
    }

    public function createFailedResponse(): Response
    {
        return $this->responseFactory->create(false);
    }

    // ########################################
}
