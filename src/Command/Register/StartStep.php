<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Register;

class StartStep extends \App\Command\BaseAbstract
{
    public const CALLBACK_STEP_NAME = 'start_step_callback';

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
     * @var \App\Repository\Telegram\ChatRepository
     */
    private $telegramChatRepository;

    /**
     * @var \App\Repository\UserRepository
     */
    private $userRepository;

    /**
     * @var \App\Model\Helper\DateTime
     */
    private $dateTimeHelper;

    // ########################################

    public function __construct(
        \App\Telegram\Model\Methods\Send\Message\Factory                  $sendMessageFactory,
        \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\Factory $inlineKeyboardMarkupFactory,
        \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Factory $inlineKeyboardButtonFactory,
        \App\Repository\Telegram\ChatRepository                           $telegramChatRepository,
        \App\Repository\UserRepository                                    $userRepository,
        \App\Model\Helper\DateTime                                        $dateTimeHelper
    ) {
        $this->sendMessageFactory                    = $sendMessageFactory;
        $this->inlineKeyboardMarkupFactory           = $inlineKeyboardMarkupFactory;
        $this->inlineKeyboardButtonFactory           = $inlineKeyboardButtonFactory;
        $this->telegramChatRepository                = $telegramChatRepository;
        $this->userRepository                        = $userRepository;
        $this->dateTimeHelper                        = $dateTimeHelper;
    }

    // ########################################

    /**
     * @return string|bool
     */
    public function validate()
    {
        /**
         * @var \App\Telegram\Model\Type\Update\MessageUpdate $update
         */
        $update = $this->getUpdate();

        $chatEntity = $this->telegramChatRepository->find($update->getMessage()->getChat()->getId());
        if (!is_null($chatEntity)) {
            return 'User already exist. Can\'t run start step.';
        }

        return true;
    }

    // ########################################

    public function processCommand(): void
    {
        /**
         * @var \App\Telegram\Model\Type\Update\MessageUpdate $update
         */
        $update = $this->getUpdate();

        $updateChat = $update->getMessage()->getChat();

        $chatEntity = $this->telegramChatRepository->create(
            $updateChat->getId(),
            $updateChat->getType(),
            $updateChat->getUsername(),
            $updateChat->getFirstName(),
            $updateChat->getLastName()
        );

        $this->userRepository->create($chatEntity);

        $this->sendFirstMessage($chatEntity);
    }

    // ########################################

    private function sendFirstMessage(\App\Entity\Telegram\Chat $chatEntity) {
        $sendMessageModel = $this->sendMessageFactory->create(
            $chatEntity->getId(),
            'Підготуватися до ЗНО дуже легко!) 10-15 хвилин щодня і ти отримаешь свої 200 балів!'//TODO TEXT
        );

        $sendMessageModel->setReplyMarkup($this->inlineKeyboardMarkupFactory->create([
            $this->inlineKeyboardButtonFactory->create('Розпочати', json_encode([self::CALLBACK_STEP_NAME])),
        ]));

        $sendMessageModel->send();
    }

    // ########################################
}
