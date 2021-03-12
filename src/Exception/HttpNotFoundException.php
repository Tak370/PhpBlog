<?php

namespace App\Exception;

class HttpNotFoundException extends AHttpException
{
    public function __construct($httpMessage = 'Cette page n\'existe pas')
    {
        parent::__construct($httpMessage, 404);
    }
}