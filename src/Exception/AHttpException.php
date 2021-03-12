<?php

namespace App\Exception;

use Exception;
use Throwable;

abstract class AHttpException extends Exception
{
    private $httpCode;
    private $httpMessage;

    public function __construct($httpMessage = '', $httpCode = 500, $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->httpCode = $httpCode;
        $this->httpMessage = $httpMessage;
    }

    /**
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @return string
     */
    public function getHttpMessage(): string
    {
        return $this->httpMessage;
    }
}