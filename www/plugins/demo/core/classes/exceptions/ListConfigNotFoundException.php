<?php


namespace Demo\Core\Classes\Errors;


use Exception;
use October\Rain\Exception\ApplicationException;

class ListConfigNotFoundException extends ApplicationException
{
    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}