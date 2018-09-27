<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Register;

class SubjectStep extends \App\Command\BaseAbstract
{
    // ########################################

    /**
     * @var \App\Telegram\Model\Type\Update\CallbackQuery\CallbackData\Factory
     */
    private $callbackDataFactory;

    // ########################################

    public function __construct(
        \App\Command\Response\Factory                                      $responseFactory,
        \App\Telegram\Model\Type\Update\CallbackQuery\CallbackData\Factory $callbackDataFactory
    ) {
        parent::__construct($responseFactory);
        $this->callbackDataFactory = $callbackDataFactory;
    }

    // ########################################

    public function process(): \App\Command\Response
    {
        /**
         * @var \App\Telegram\Model\Type\Update\CallbackQuery $callbackQuery
         */
        $callbackQuery = $this->getUpdate();
        if (!$callbackQuery->hasData()) {
            throw new \App\Model\Exception\Logic('Callback data is empty.');
        }

        $callbackData = $this->callbackDataFactory->create($callbackQuery->getData());

        return $this->createSuccessResponse();
    }

    // ########################################
}
