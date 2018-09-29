<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Command\Register;

class SubjectStep extends \App\Command\BaseAbstract
{
    private const BUTTON_SAVE_TEXT = 'Зберегти';

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
     * @var \App\Repository\UserRepository
     */
    private $userRepository;

    /**
     * @var \App\Repository\SubjectRepository
     */
    private $subjectRepository;

    // ########################################

    public function __construct(
        \App\Telegram\Model\Methods\Send\Message\Factory                                $sendMessageFactory,
        \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\Factory                $replyKeyboardMarkupFactory,
        \App\Telegram\Model\Type\ReplyMarkup\ReplyKeyboardMarkup\KeyboardButton\Factory $keyboardButtonFactory,
        \App\Repository\UserRepository                                                  $userRepository,
        \App\Repository\SubjectRepository                                               $subjectRepository
    ) {
        $this->sendMessageFactory         = $sendMessageFactory;
        $this->replyKeyboardMarkupFactory = $replyKeyboardMarkupFactory;
        $this->keyboardButtonFactory      = $keyboardButtonFactory;
        $this->userRepository             = $userRepository;
        $this->subjectRepository          = $subjectRepository;
    }

    // ########################################
    /**
     * @return bool|string
     */
    public function validate()
    {
        if (!$this->getUpdate()->isCallbackQuery() || !$this->getUpdate()->isMessageUpdate()) {
            return 'Wrong update type.';
        }

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
        if ($this->getUpdate() instanceof \App\Telegram\Model\Type\Update\CallbackQuery) {
            /**
             * @var \App\Telegram\Model\Type\Update\CallbackQuery $callbackQuery
             */
            $callbackQuery = $this->getUpdate();

            $userEntity = $this->userRepository->find($callbackQuery->getMessage()->getChat()->getId());
            if (is_null($userEntity)) {
                throw new \App\Model\Exception\Logic('User is not found.');
            }

            $callbackData = $callbackQuery->getData();
            $callbackData = array_shift($callbackData);

            if ($callbackData == \App\Command\Register\StartStep::CALLBACK_STEP_NAME) {
                if ($this->sendSubjects($callbackQuery->getFrom()->getId())) {

                    $userEntity->setRegisterSubjectStep();
                    $this->userRepository->update($userEntity);
                    return;
                }

                //todo event something goes wrong
                return;
            }
        }

        /**
         * @var \App\Telegram\Model\Type\Update\MessageUpdate $messageUpdate
         */
        $messageUpdate = $this->getUpdate();

        $userEntity = $this->userRepository->find($messageUpdate->getMessage()->getChat()->getId());
        if (is_null($userEntity)) {
            throw new \App\Model\Exception\Logic('User is not found.');
        }

        if ($messageUpdate->getMessage()->getText() == self::BUTTON_SAVE_TEXT) {
            if (!$userEntity->hasSubjects()) {
                $sendMessageModel = $this->sendMessageFactory->create(
                    $messageUpdate->getMessage()->getChat()->getId(),
                    'Оберіть хоча б один предмет'//TODO TEXT
                );
                $sendMessageModel->send();
            }
        }

        $subjects = $this->subjectRepository->findAll();
        foreach ($subjects as $subject) {
            if ($subject->getName()      == $messageUpdate->getMessage()->getText() ||
                $subject->getShortName() == $messageUpdate->getMessage()->getText()
            ) {
                $userEntity->addSubject($subject);
                break;
            }
        }
    }

    private function sendSubjects(int $chatId)
    {
        $sendMessageModel = $this->sendMessageFactory->create($chatId, 'Оберіть предмети для заннятя');//TODO TEXT

        $subjects = $this->subjectRepository->findAll();

        $replyKeyboardMarkup = $this->replyKeyboardMarkupFactory->create();

        $index = 0;
        while (count($subjects) != $index) {
            $row = [];

            $subject     = $subjects[$index];
            $subjectName = $subject->isHasShortName() ? $subject->getShortName() : $subject->getName();
            $row[]       = $this->keyboardButtonFactory->create($subjectName);
            $index++;

            $subject     = $subjects[$index];
            $subjectName = $subject->isHasShortName() ? $subject->getShortName() : $subject->getName();
            $row[]       = $this->keyboardButtonFactory->create($subjectName);
            $index++;

            $replyKeyboardMarkup->addKeyboardButtonRow($row);
        }

        $replyKeyboardMarkup->addKeyboardButtonRow([$this->keyboardButtonFactory->create(self::BUTTON_SAVE_TEXT)]);
        $replyKeyboardMarkup->setResizeKeyboard(true);

        $sendMessageModel->setReplyMarkup($replyKeyboardMarkup);

        $response = $sendMessageModel->send();
        if ($response instanceof \App\Telegram\Model\Request\Response\Success) {
            return true;
        }

        return false;
    }

    // ########################################
}
