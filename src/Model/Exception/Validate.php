<?php

/**
 * @author     School Assistant Developers Team
 * @copyright  2018-2018 School Assistant
 * @license    Any usage is forbidden
 */

namespace App\Model\Exception;

class Validate extends \Exception
{
    // ########################################

    /**  @var array */
    private $inputData = [];

    public function __construct($fileName = '', $fieldName = '', $inputData = [], $message = '', $code = 0)
    {
        parent::__construct($message, $code, null);
        $this->inputData = $inputData;
    }

    // ########################################

    public function getInputData()
    {
        return $this->inputData;
    }

    // ########################################
}
