<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Service\Telegram\Command;

use App\Service\Telegram\Command\Response\Factory as ResponseFactory;

abstract class BaseAbstract
{
    // ########################################

    /**
     * @var \App\Service\Telegram\Command\Response\Factory
     */
    private $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
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
