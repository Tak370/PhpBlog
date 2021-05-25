<?php


namespace App\Exception;


class InternalErrorException extends AHttpException
{
    public function __construct($httpMessage = '')
    {
        parent::__construct($httpMessage, 500);
    }
}