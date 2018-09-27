<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 10.09.2018
 * Time: 00:12
 */

namespace App\Command;

abstract class BaseAbstract implements AwareInterface
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

    public function setResponseFactory(Response\Factory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    // ########################################

    /**
     * @return string|bool
     */
    abstract public function validate();

    abstract public function processCommand(): void;

    public function run()
    {
        $trueOrMessage = $this->validate();

        if ($trueOrMessage !== true) {
            return $this->createFailedResponse($trueOrMessage);
        }

        $this->processCommand();

        return $this->createSuccessResponse();
    }

    // ########################################

    public function createSuccessResponse(): Response
    {
        return $this->responseFactory->create();
    }

    public function createFailedResponse(string $message): Response
    {
        return $this->responseFactory->create(false, $message);
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
    public function setUpdate(\App\Telegram\Model\Type\Update\BaseAbstract $update)
    {
        $this->update = $update;
    }

    // ########################################
}
