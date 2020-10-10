<?php

require '../config/swiftmailerConfig.php';

// Send an Email using SwiftMailer
if (isset($_POST['sendmail'])) {
// Create the Transport
$transport = (new Swift_SmtpTransport(EMAIL_HOST, EMAIL_PORT, EMAIL_ENCRYPTION))
->setUsername(EMAIL_USERNAME)
->setPassword(EMAIL_PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Contact'))
->setFrom([EMAIL_USERNAME => 'Laurent Legrand'])
->setTo([EMAIL_USERNAME])
->setReplyTo($_POST['email'], $_POST['name'])
->setBody($_POST['message']);

// Send the message
$result = $mailer->send($message);
}
