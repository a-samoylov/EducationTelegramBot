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

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $fieldName;

    /**
     * @var array
     */
    private $inputData;

    public function __construct($fileName = '', $fieldName = '', $inputData = [], $message = '', $code = 0)
    {
        parent::__construct($message, $code);

        $this->fileName  = $fileName;
        $this->fieldName = $fieldName;
        $this->inputData = $inputData;
    }

    // ########################################

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * @return array
     */
    public function getInputData(): array
    {
        return $this->inputData;
    }

    // ########################################
}
