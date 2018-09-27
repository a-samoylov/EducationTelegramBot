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

    /**
     * @var \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\Factory
     */
    private $replyKeyboardMarkupFactory;

    /**
     * @var \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\KeyboardButton\Factory
     */
    private $keyboardButtonFactory;

    /**
     * @var \App\Repository\SubjectRepository
     */
    private $subjectRepository;

    // ########################################

    public function __construct(
        \App\Telegram\Model\Methods\Send\Message\Factory                                $sendMessageFactory,
        \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\Factory                $replyKeyboardMarkupFactory,
        \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\KeyboardButton\Factory $keyboardButtonFactory,
        \App\Repository\SubjectRepository                                               $subjectRepository
    ) {
        $this->sendMessageFactory         = $sendMessageFactory;
        $this->replyKeyboardMarkupFactory = $replyKeyboardMarkupFactory;
        $this->keyboardButtonFactory      = $keyboardButtonFactory;
        $this->subjectRepository          = $subjectRepository;
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

        $callbackData = $callbackQuery->getData();
        $callbackData = array_shift($callbackData);

        if ($callbackData == \App\Command\Register\StartStep::CALLBACK_STEP_NAME) {
            $this->sendSubjects($callbackQuery->getFrom()->getId());
            return;
        }

        throw new \App\Model\Exception\Logic('Invalid callback data: ' . print_r($callbackQuery->getData(), true));
    }

    private function sendSubjects(int $chatId)
    {
        $sendMessageModel = $this->sendMessageFactory->create($chatId, 'Оберіть предмети для заннятя');//TODO TEXT

        $subjects = $this->subjectRepository->findAll();

        $replyKeyboardMarkup = $this->replyKeyboardMarkupFactory->create();

        $replyKeyboardMarkup->addKeyboardButtonRow([
            $this->keyboardButtonFactory->create('Укр. мова1'),
            $this->keyboardButtonFactory->create('Укр. мова2'),
        ]);

        $replyKeyboardMarkup->addKeyboardButtonRow([
            $this->keyboardButtonFactory->create('Укр. мова3'),
            $this->keyboardButtonFactory->create('Укр. мова4'),
        ]);

        $sendMessageModel->setReplyMarkup($replyKeyboardMarkup);

        $sendMessageModel->send();
    }

    // ########################################
}
