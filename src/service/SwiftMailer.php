<?php
namespace App\service;

use App\Config;

class SwiftMailer
{
    private $config;
    private $mailer;

    public function __construct()
    {
        $this->config = Config::getInstance();

        // Create the Transport
        $transport = (new \Swift_SmtpTransport($this->config->get('EMAIL_HOST'), $this->config->get('EMAIL_PORT'), $this->config->get('EMAIL_ENCRYPTION')))
            ->setUsername($this->config->get('EMAIL_USERNAME'))
            ->setPassword($this->config->get('EMAIL_PASSWORD'));

        // Create the Mailer using your created Transport
        $this->mailer = new \Swift_Mailer($transport);
    }

    public function send(string $email, string $name, string $subject, $message)
    {
        // Create a message
        $message = (new \Swift_Message('Contact'))
            ->setFrom([$this->config->get('EMAIL_USERNAME') => 'Laurent Legrand'])
            ->setTo([$this->config->get('EMAIL_USERNAME')])
            ->setReplyTo($email, $name)
            ->setBody($message);

        // Send the message
        $this->mailer->send($message);
    }
}


