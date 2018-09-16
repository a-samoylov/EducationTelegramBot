<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Service\Command;

use App\Config\Telegram as TelegramConfig;
use App\Service\Telegram\Model\Type\Update\MessageUpdate;

class ServiceResolver
{
    private const DEFAULT_COMMAND_SERVICE = 'telegram.default.command';

    /**
     * @var \App\Config\Telegram
     */
    private $telegramConfig;

    // ########################################

    public function __construct(TelegramConfig $telegramConfig)
    {
        $this->telegramConfig = $telegramConfig;
    }

    // ########################################
    /**
     * @param \App\Service\Telegram\Model\Type\Update\BaseAbstract $update
     *
     * @return string
     */
    public function resolve($update): ?string
    {
        $result = self::DEFAULT_COMMAND_SERVICE;

        if ($update instanceof MessageUpdate) {
            $serviceName = $this->getServiceNameByMessageUpdate($update);
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
    private function getServiceNameByMessageUpdate(\App\Service\Telegram\Model\Type\Update\MessageUpdate $update): ?string
    {
        return $this->telegramConfig->getMessageServiceName($update->getMessage()->getText());
    }

    // ########################################
}
