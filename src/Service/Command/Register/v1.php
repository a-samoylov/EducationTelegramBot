<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command\Register;

use App\Model\Command\Response;
use App\Model\Command\Response\Factory as ResponseFactory;
use App\Service\Telegram\Model\Methods\Send\Message\Factory as SendMessageFactory;
use App\Model\Command\BaseAbstract;
use App\Service\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\Factory as ReplyKeyboardMarkupFactory;
use App\Service\Telegram\Model\Type\ReplyMarkup\KeyboardButton\Factory as KeyboardButtonFactory;
use App\Repository\TelegramChatRepository;

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
    /**
     * @var \App\Repository\TelegramChatRepository
     */
    private $telegramChatRepository;

    // ########################################

    public function __construct(
        SendMessageFactory         $sendMessageFactory,
        ResponseFactory            $responseFactory,
        ReplyKeyboardMarkupFactory $replyKeyboardMarkupFactory,
        KeyboardButtonFactory      $keyboardButtonFactory,
        TelegramChatRepository     $telegramChatRepository
    ) {
        parent::__construct($responseFactory);

        $this->sendMessageFactory         = $sendMessageFactory;
        $this->replyKeyboardMarkupFactory = $replyKeyboardMarkupFactory;
        $this->keyboardButtonFactory      = $keyboardButtonFactory;
        $this->telegramChatRepository     = $telegramChatRepository;
    }

    // ########################################

    public function process(): Response
    {
        /**
         * @var \App\Service\Telegram\Model\Type\Update\MessageUpdate $update
         */
        $update = $this->getUpdate();

        $chatType = $update->getMessage()->getChat();

        $chatEntity = $this->telegramChatRepository->findByChatId($chatType->getId());
        if (is_null($chatEntity)) {
            $chatEntity = $this->telegramChatRepository->create(
                $chatType->getId(),
                $chatType->getType(),
                $chatType->getUsername(),
                $chatType->getFirstName(),
                $chatType->getLastName()
            );

            $this->sendFirstMessage($chatEntity);

            return $this->createSuccessResponse();
        }


        return $this->createSuccessResponse();
    }

    // ########################################

    private function sendFirstMessage(\App\Entity\TelegramChat $chatEntity)
    {
        $sendMessageModel = $this->sendMessageFactory->create($chatEntity->getChatId(), 'Вітаємо на порталі підготовки до ЗНО!');
        $sendMessageModel->setReplyMarkup($this->replyKeyboardMarkupFactory->create([
            $this->keyboardButtonFactory->create('Зареєструватися за номером телефона', true)//TODO TEXT
        ], true));

        $sendMessageModel->send();
    }

    // ########################################
}
