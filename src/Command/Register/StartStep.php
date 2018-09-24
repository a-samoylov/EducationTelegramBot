<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Register;

class StartStep extends \App\Command\BaseAbstract
{
    /**
     * @var \App\Telegram\Model\Methods\Send\Message\Factory
     */
    private $sendMessageFactory;

    /**
     * @var \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\Factory
     */
    private $inlineKeyboardMarkupFactory;

    /**
     * @var \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Factory
     */
    private $inlineKeyboardButtonFactory;

    /**
     * @var \App\Repository\TelegramChatRepository
     */
    private $telegramChatRepository;

    /**
     * @var \App\Repository\UserRepository
     */
    private $userRepository;

    /**
     * @var \App\Repository\Telegram\CallbackMessageRepository
     */
    private $telegramCallbackMessageRepository;

    /**
     * @var \App\Repository\Telegram\SendCallbackMessageRepository
     */
    private $telegramSendCallbackMessageRepository;

    /**
     * @var \App\Model\Helper\DateTime
     */
    private $dateTimeHelper;

    // ########################################

    public function __construct(
        \App\Telegram\Model\Methods\Send\Message\Factory                  $sendMessageFactory,
        \App\Command\Response\Factory                                     $responseFactory,
        \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\Factory $inlineKeyboardMarkupFactory,
        \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Factory $inlineKeyboardButtonFactory,
        \App\Repository\TelegramChatRepository                            $telegramChatRepository,
        \App\Repository\UserRepository                                    $userRepository,
        \App\Repository\Telegram\CallbackMessageRepository                $telegramCallbackMessageRepository,
        \App\Repository\Telegram\SendCallbackMessageRepository            $telegramSendCallbackMessageRepository,
        \App\Model\Helper\DateTime                                        $dateTimeHelper
    ) {
        parent::__construct($responseFactory);

        $this->sendMessageFactory                    = $sendMessageFactory;
        $this->inlineKeyboardMarkupFactory           = $inlineKeyboardMarkupFactory;
        $this->inlineKeyboardButtonFactory           = $inlineKeyboardButtonFactory;
        $this->telegramChatRepository                = $telegramChatRepository;
        $this->userRepository                        = $userRepository;
        $this->telegramCallbackMessageRepository     = $telegramCallbackMessageRepository;
        $this->telegramSendCallbackMessageRepository = $telegramSendCallbackMessageRepository;
        $this->dateTimeHelper                        = $dateTimeHelper;
    }

    // ########################################

    public function process(): \App\Command\Response
    {
        /**
         * @var \App\Telegram\Model\Type\Update\MessageUpdate $update
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

            $this->userRepository->create($chatEntity);

            $callbackMessage = $this->telegramCallbackMessageRepository->findOneBy(['name' => 'start_step']);
            if (is_null($callbackMessage)) {
                //todo event все плохо
                return $this->createFailedResponse();
            }

            $this->sendFirstMessage($chatEntity, $callbackMessage);
        }

        return $this->createSuccessResponse();
    }

    // ########################################

    private function sendFirstMessage(
        \App\Entity\TelegramChat $chatEntity,
        \App\Entity\Telegram\CallbackMessage $callbackMessage
    ) {

        $sendCallbackMessage = $this->telegramSendCallbackMessageRepository->create();

        $sendMessageModel = $this->sendMessageFactory->create($chatEntity->getId(), $callbackMessage->getMessageText());
        //TODO id, btn

        //todo add inlineKeyboardButton
        $sendMessageModel->setReplyMarkup($this->inlineKeyboardMarkupFactory->create([
            $this->inlineKeyboardButtonFactory->create('Розпочати', json_encode([
                'id' => $sendCallbackMessage->getId(),
                'btn' => 11111
            ])),
        ]));
        $sendMessageModel->send();
    }

    // ########################################
}
