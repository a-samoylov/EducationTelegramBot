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

    public function getCommand($commandAlias)
    {
        $commands = $this->getCommands();

        if (is_null($commands)) {
            return null;
        }

        return isset($commands[$commandAlias]) ? $commands[$commandAlias] : null;
    }

    // ########################################

    private function getCommands()
    {
        return isset($this->configs['commands']) ? $this->configs['commands'] : null;
    }

    // ########################################
}
