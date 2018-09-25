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
        \App\Command\Response\Factory                                     $responseFactory,
        \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardMarkup\Factory $inlineKeyboardMarkupFactory,
        \App\Telegram\Model\Type\ReplyMarkup\InlineKeyboardButton\Factory $inlineKeyboardButtonFactory,
        \App\Repository\Telegram\ChatRepository                            $telegramChatRepository,
        \App\Repository\UserRepository                                    $userRepository,
        \App\Model\Helper\DateTime                                        $dateTimeHelper
    ) {
        parent::__construct($responseFactory);

        $this->sendMessageFactory                    = $sendMessageFactory;
        $this->inlineKeyboardMarkupFactory           = $inlineKeyboardMarkupFactory;
        $this->inlineKeyboardButtonFactory           = $inlineKeyboardButtonFactory;
        $this->telegramChatRepository                = $telegramChatRepository;
        $this->userRepository                        = $userRepository;
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
        if (!is_null($chatEntity)) {
            throw new \App\Model\Exception\Logic('User already exist. Can\'t run start step.');
        }

        $chatEntity = $this->telegramChatRepository->create(
            $updateChat->getId(),
            $updateChat->getType(),
            $updateChat->getUsername(),
            $updateChat->getFirstName(),
            $updateChat->getLastName()
        );

        $this->userRepository->create($chatEntity);

        $this->sendFirstMessage($chatEntity);

        return $this->createSuccessResponse();
    }

    // ########################################

    private function sendFirstMessage(\App\Entity\Telegram\Chat $chatEntity) {
        $sendMessageModel = $this->sendMessageFactory->create(
            $chatEntity->getId(),
            'Підготуватися до ЗНО дуже легко!) 10-15 хвилин щодня і ти отримаешь свої 200 балів!'//TODO TEXT
        );

        $sendMessageModel->setReplyMarkup($this->inlineKeyboardMarkupFactory->create([
            $this->inlineKeyboardButtonFactory->create('Розпочати', 'start_step'),
        ]));
        $sendMessageModel->send();
    }

    // ########################################
}
