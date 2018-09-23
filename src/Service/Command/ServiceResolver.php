<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command;

use App\Config\Telegram as TelegramConfig;
use App\Service\Telegram\Model\Type\Update\MessageUpdate;
use App\Service\Telegram\Model\Type\Update\CallbackQuery;
use App\Repository\UserRepository;
use App\Model\Exception\Logic as LogicException;

class ServiceResolver
{
    private const DEFAULT_COMMAND_SERVICE = 'telegram.default.command';

    /**
     * @var \App\Config\Telegram
     */
    private $telegramConfig;

    /**
     * @var \App\Repository\UserRepository
     */
    private $userRepository;

    // ########################################

    public function __construct(TelegramConfig $telegramConfig, UserRepository $userRepository)
    {
        $this->telegramConfig = $telegramConfig;
        $this->userRepository = $userRepository;
    }

    // ########################################
    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return string
     */
    public function resolve($update): string
    {
        $result = self::DEFAULT_COMMAND_SERVICE;

        if ($update instanceof MessageUpdate) {
            $serviceName = $this->getServiceNameByMessageUpdate($update);
            if (!is_null($serviceName)) {
                $result = $serviceName;
            }
        } elseif ($update instanceof CallbackQuery) {
            $serviceName = $this->getServiceNameByCallbackQuery($update);
            if (!is_null($serviceName)) {
                $result = $serviceName;
            }
        }
        //todo other

        //todo event if cant found service name

        return $result;
    }

    // ########################################

    /**
     * @param \App\Service\Telegram\Model\Type\Update\MessageUpdate $update
     *
     * @return null|string
     */
    private function getServiceNameByMessageUpdate(MessageUpdate $update): ?string
    {
        return $this->telegramConfig->getMessageServiceName($update->getMessage()->getText());
    }

    // ----------------------------------------

    /**
     * @param \App\Service\Telegram\Model\Type\Update\CallbackQuery $callbackQuery
     *
     * @return null|string
     * @throws \App\Model\Exception\Logic
     */
    private function getServiceNameByCallbackQuery(CallbackQuery $callbackQuery): ?string
    {
        $userEntity = $this->userRepository->find($callbackQuery->getFrom()->getId());
        if (is_null($userEntity)) {
            throw new LogicException('Not found user by chat id from callback query.');
        }

        if ($userEntity->isRegister()) {
            //todo ZNO test
        }

        if ($userEntity->hasSubjects()) {
            return $this->telegramConfig->getCallbackQueryServiceName('subject_step');
        }

        return null;
    }

    // ########################################
}
