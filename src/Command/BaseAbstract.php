<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Command;

abstract class BaseAbstract
{
    // ########################################

    /**
     * @var \App\Command\Response\Factory
     */
    private $responseFactory = null;

    /**
     * @var \App\Telegram\Model\Type\Update\BaseAbstract
     */
    private $update = null;

    // ########################################

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

    /**
     * @return \App\Telegram\Model\Type\Update\BaseAbstract
     */
    public function getUpdate(): \App\Telegram\Model\Type\Update\BaseAbstract
    {
        return $this->update;
    }

    /**
     * @param \App\Telegram\Model\Type\Update\BaseAbstract $update
     */
    public function setUpdate(\App\Telegram\Model\Type\Update\BaseAbstract $update): void
    {
        $this->update = $update;
    }

    // ########################################
}
