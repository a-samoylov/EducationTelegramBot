<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Register;

class SubjectStep extends \App\Command\BaseAbstract
{
    /**
     * @var \App\Telegram\Model\Methods\Send\Message\Factory
     */
    private $sendMessageFactory;

    // ########################################

    public function __construct(\App\Telegram\Model\Methods\Send\Message\Factory $sendMessageFactory) {
        $this->sendMessageFactory = $sendMessageFactory;
    }

    // ########################################
    /**
     * @return bool|string
     */
    public function validate()
    {
        /**
         * @var \App\Telegram\Model\Type\Update\CallbackQuery $callbackQuery
         */
        $callbackQuery = $this->getUpdate();
        if (!$callbackQuery->hasData()) {
            return 'Callback data is empty.';
        }

        return true;
    }

    // ########################################

    public function processCommand(): void
    {
        /**
         * @var \App\Telegram\Model\Type\Update\CallbackQuery $callbackQuery
         */
        $callbackQuery = $this->getUpdate();

        $callbackData = array_shift($callbackQuery->getData());
        if ($callbackData != \App\Command\Register\StartStep::CALLBACK_STEP_NAME) {
            throw new \App\Model\Exception\Logic('Invalid callback data: ' . print_r($callbackQuery->getData(), true));
        }

        $this->sendSubjects($callbackQuery->getFrom()->getId());
    }

    private function sendSubjects(int $chatId)
    {
        $sendMessageModel = $this->sendMessageFactory->create($chatId, 'Оберіть предмети для заннятя');//TODO TEXT

        $sendMessageModel->setReplyMarkup($this->inlineKeyboardMarkupFactory->create([
            $this->inlineKeyboardButtonFactory->create('Розпочати', json_encode([self::CALLBACK_STEP_NAME])),
        ]));

        $sendMessageModel->send();

    }

    // ########################################
}
