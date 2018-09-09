<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Config;

use Symfony\Component\Yaml\Yaml;

class YamlLoader
{
    private $baseDir = null;

    // ########################################

    public function __construct($baseDir)
    {
        $this->baseDir = $baseDir . 'config\\';
    }

    // ########################################

    public function load($resource)
    {
        return Yaml::parse(file_get_contents($this->baseDir . $resource . '.yaml'));
    }

    // ########################################
}
