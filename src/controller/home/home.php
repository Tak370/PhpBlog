<?php
use App\Connection;
use App\service\SwiftMailer;

$title = 'Mon Site';
$pdo = Connection::getPDO();

if (isset($_POST['sendmail'])) {
    $swiftMailer = new SwiftMailer();
    $swiftMailer->send($_POST['email'], $_POST['name'], 'Contact', $_POST['message']);
}

require '../view/home/home.php';
