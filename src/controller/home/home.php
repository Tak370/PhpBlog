<?php
use App\Service\SwiftMailer;

$title = 'Mon Site';

if (isset($_POST['sendmail'])) {
    $swiftMailer = new SwiftMailer();
    $swiftMailer->send($_POST['email'], $_POST['name'], 'Contact', $_POST['message']);
}
ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'home/home.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/home.php';
