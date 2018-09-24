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
use App\Model\Exception\Logic as LogicException;
use App\Telegram\Model\Type\Update\CallbackQuery\CallbackData\Factory as CallbackDataFactory;

class SubjectStep extends BaseAbstract
{
    // ########################################

    /**
     * @var \App\Telegram\Model\Type\Update\CallbackQuery\CallbackData\Factory
     */
    private $callbackDataFactory;

    // ########################################

    public function __construct(
        ResponseFactory $responseFactory,
        CallbackDataFactory $callbackDataFactory
    ) {
        parent::__construct($responseFactory);
        $this->callbackDataFactory = $callbackDataFactory;
    }

    // ########################################

    public function process(): Response
    {
        /**
         * @var \App\Telegram\Model\Type\Update\CallbackQuery $callbackQuery
         */
        $callbackQuery = $this->getUpdate();
        if (!$callbackQuery->hasData()) {
            throw new LogicException('Callback data is empty.');
        }

        $callbackData = $this->callbackDataFactory->create($callbackQuery->getData());

        return $this->createSuccessResponse();
    }

    // ########################################
}
