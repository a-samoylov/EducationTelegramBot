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
use App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Factory as InlineKeyboardButtonFactory;
use App\Service\Telegram\Model\Type\ReplyMarkup\KeyboardButton\Factory as KeyboardButtonFactory;
use App\Repository\TelegramChatRepository;
use App\Repository\UserRepository;

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
    /**
     * @var \App\Repository\UserRepository
     */
    private $telegramUserRepository;

    /**
     * @var \App\Service\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Factory
     */
    private $inlineKeyboardButtonFactory;

    // ########################################

    public function __construct(
        SendMessageFactory          $sendMessageFactory,
        ResponseFactory             $responseFactory,
        ReplyKeyboardMarkupFactory  $replyKeyboardMarkupFactory,
        InlineKeyboardButtonFactory $inlineKeyboardButtonFactory,
        KeyboardButtonFactory       $keyboardButtonFactory,
        TelegramChatRepository      $telegramChatRepository,
        UserRepository              $telegramUserRepository
    ) {
        parent::__construct($responseFactory);

        $this->sendMessageFactory          = $sendMessageFactory;
        $this->replyKeyboardMarkupFactory  = $replyKeyboardMarkupFactory;
        $this->keyboardButtonFactory       = $keyboardButtonFactory;
        $this->inlineKeyboardButtonFactory = $inlineKeyboardButtonFactory;
        $this->telegramChatRepository      = $telegramChatRepository;
        $this->telegramUserRepository      = $telegramUserRepository;
    }

    // ########################################

    public function process(): Response
    {
        /**
         * @var \App\Service\Telegram\Model\Type\Update\MessageUpdate $update
         */
        $update = $this->getUpdate();

        $updateChat = $update->getMessage()->getChat();

        $chatEntity = $this->telegramChatRepository->find($updateChat->getId());
        if (is_null($chatEntity)) {
            $chatEntity = $this->telegramChatRepository->create(
                $updateChat->getId(),
                $updateChat->getType(),
                $updateChat->getUsername(),
                $updateChat->getFirstName(),
                $updateChat->getLastName()
            );

            $this->sendFirstMessage($chatEntity);

            return $this->createSuccessResponse();
        }

        $user = $this->telegramUserRepository->findByChatId($chatEntity);
        if (is_null($user)) {
            $this->sendFirstMessage($chatEntity);

            return $this->createSuccessResponse();
        }

        if (is_null($user->getIntensity())) {
            $this->sendChoiceIntensity($chatEntity);

            return $this->createSuccessResponse();
        }

        if (empty($user->getSubjects()->getKeys())) {
            $this->sendChoiceSubjects($chatEntity);

            return $this->createSuccessResponse();
        }

        return $this->createSuccessResponse();
    }

    // ########################################

    private function sendFirstMessage(\App\Entity\TelegramChat $chatEntity)
    {
        $sendMessageModel = $this->sendMessageFactory->create($chatEntity->getId(), 'Вітаємо на порталі підготовки до ЗНО!');//TODO TEXT
        $sendMessageModel->setReplyMarkup($this->replyKeyboardMarkupFactory->create([
            $this->keyboardButtonFactory->create('Зареєструватися за номером телефона', true)
        ], true));

        /*$sendMessageModel->setReplyMarkup($this->inlineKeyboardButtonFactory->create(
            'Hello'
        ));*/
        $sendMessageModel->send();
    }

    private function sendChoiceIntensity(\App\Entity\TelegramChat $chatEntity)
    {

    }

    private function sendChoiceSubjects(\App\Entity\TelegramChat $chatEntity)
    {

    }

    // ########################################
}
