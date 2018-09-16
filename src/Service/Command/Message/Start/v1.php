<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command\Message\Start;

use App\Model\Command\Response;
use App\Model\Command\Response\Factory as ResponseFactory;
use App\Service\Telegram\Model\Methods\Send\Message\Factory as SendMessageFactory;
use App\Model\Command\BaseAbstract;
use App\Service\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\Factory as ReplyKeyboardMarkupFactory;
use App\Service\Telegram\Model\Type\ReplyMarkup\KeyboardButton\Factory as KeyboardButtonFactory;

class v1 extends BaseAbstract
{
    /**
     * @var \App\Service\Telegram\Model\Methods\Send\Message\Factory
     */
    private $sendMessageFactory;

    /**
     * @var \App\Service\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\Factory
     */
    private $replyKeyboardMarkupFactory;

    /**
     * @var \App\Service\Telegram\Model\Type\ReplyMarkup\KeyboardButton\Factory
     */
    private $keyboardButtonFactory;

    // ########################################

    public function __construct(
        SendMessageFactory $sendMessageFactory,
        ResponseFactory $responseFactory,
        ReplyKeyboardMarkupFactory $replyKeyboardMarkupFactory,
        KeyboardButtonFactory $keyboardButtonFactory
    ) {
        parent::__construct($responseFactory);
        $this->sendMessageFactory         = $sendMessageFactory;
        $this->replyKeyboardMarkupFactory = $replyKeyboardMarkupFactory;
        $this->keyboardButtonFactory      = $keyboardButtonFactory;
    }

    // ########################################

    public function process(): Response
    {
        /**
         * @var \App\Service\Telegram\Model\Type\Update\MessageUpdate $update
         */
        $update = $this->getUpdate();

        //todo save user|chat entity

        $sendMessageModel = $this->sendMessageFactory->create($update->getMessage()->getChat()->getId(), 'Доброго дня!');
        $sendMessageModel->setReplyMarkup($this->replyKeyboardMarkupFactory->create([
            $this->keyboardButtonFactory->create('Зареєструватися')
        ]));

        $sendMessageModel->send();

        return $this->createSuccessResponse();
    }

    // ########################################
}
