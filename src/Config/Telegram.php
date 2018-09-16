<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Config;

class Telegram
{
    /** @var array */
    private $configs;

    // ########################################

    public function __construct(YamlLoader $loader)
    {
        $this->configs = $loader->load('telegram');
    }

    // ########################################

    public function getAuthToken(): ?string
    {
        return isset($this->configs['parameters']['auth_token']) ? $this->configs['parameters']['auth_token'] : null;
    }

    public function getApiUrl(): ?string
    {
        return isset($this->configs['parameters']['api_url']) ? $this->configs['parameters']['api_url'] : null;
    }
    // ########################################

    public function getCommandClass($commandAlias, $commandType = null)
    {
        $commands = $this->getCommands();

        if (is_null($commands)) {
            return null;
        }

        $commandAlias = strtolower($commandAlias);

        if (!isset($commands[$commandAlias])) {
            return null;
        }

        $command = $commands[$commandAlias];

        if (!isset($command['class'])) {
            throw new \Exception(); //todo
        }

        $validators = isset($command['validators']) ? $command['validators'] : [];

        return [$command['class'], $validators];
    }

    // ########################################

    private function getCommands()
    {
        return isset($this->configs['commands']) ? $this->configs['commands'] : null;
    }

    // ########################################
}
