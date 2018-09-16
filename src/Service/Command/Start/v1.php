<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command\Start;

use App\Model\Command\Response;
use App\Model\Command\Response\Factory as ResponseFactory;
use App\Service\Telegram\Model\Methods\Send\Message\Factory as SendMessageFactory;
use App\Model\Command\BaseAbstract;
use App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton\Factory as InlineKeyboardButtonFactory;

class v1 extends BaseAbstract
{
    /**
     * @var \App\Service\Telegram\Model\Methods\Send\Message\Factory
     */
    private $sendMessageFactory = null;

    /**
     * @var \App\Service\Telegram\Model\Type\Inline\InlineKeyboardButton\Factory
     */
    private $inlineKeyboardButtonFactory;

    // ########################################

    public function __construct(
        SendMessageFactory $sendMessageFactory,
        ResponseFactory $responseFactory,
        InlineKeyboardButtonFactory $inlineKeyboardButtonFactory
    ) {
        parent::__construct($responseFactory);
        $this->sendMessageFactory          = $sendMessageFactory;
        $this->inlineKeyboardButtonFactory = $inlineKeyboardButtonFactory;
    }

    // ########################################

    public function process(): Response
    {
        /**
         * @var \App\Service\Telegram\Model\Type\Update\MessageUpdate $update
         */
        $update = $this->getUpdate();

        //todo save user entity

        $sendMessageModel = $this->sendMessageFactory->create($update->getMessage()->getChat()->getId(), 'Доброго дня!');
        $sendMessageModel->setReplyMarkup([
            $this->inlineKeyboardButtonFactory->create(['text' => 'Зареєструватися'])
        ]);

        $sendMessageModel->send();

        return $this->createSuccessResponse();
    }

    // ########################################
}
