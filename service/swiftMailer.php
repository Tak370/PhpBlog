<?php

use App\Config;

// Send an Email using SwiftMailer
if (isset($_POST['sendmail'])) {
    $config = Config::getInstance();
// Create the Transport
$transport = (new Swift_SmtpTransport($config->get('EMAIL_HOST'), $config->get('EMAIL_PORT'), $config->get('EMAIL_ENCRYPTION')))
->setUsername($config->get('EMAIL_USERNAME'))
->setPassword($config->get('EMAIL_PASSWORD'));

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Contact'))
->setFrom([$config->get('EMAIL_USERNAME') => 'Laurent Legrand'])
->setTo([$config->get('EMAIL_USERNAME')])
->setReplyTo($_POST['email'], $_POST['name'])
->setBody($_POST['message']);

// Send the message
$result = $mailer->send($message);
}
