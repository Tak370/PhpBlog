<?php

ob_start();
require $this->viewPath . DIRECTORY_SEPARATOR . 'auth/logout.php';
$content = ob_get_clean();
require $this->viewPath . DIRECTORY_SEPARATOR . 'layout/blog.php';