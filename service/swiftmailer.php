<?php

// Send an Email using SwiftMailer
if (isset($_POST['sendmail'])) {
// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
->setUsername('llegrandcontact@gmail.com')
->setPassword('brvuxgdvdngwgmst');

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Contact'))
->setFrom(['llegrandcontact@gmail.com' => 'Laurent Legrand'])
->setTo(['llegrandcontact@gmail.com'])
->setReplyTo($_POST['email'], $_POST['name'])
->setBody($_POST['message']);

// Send the message
$result = $mailer->send($message);
}
