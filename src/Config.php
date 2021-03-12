<?php
namespace App;

class Config
{
    private static $INSTANCE = null;
    private $config;

    private function __construct()
    {
        $this->config = require_once '../config/config.php';
    }

    public static function getInstance()
    {
        if (self::$INSTANCE === null) {
            self::$INSTANCE = new Config();
        }
        return self::$INSTANCE;
    }

    public function get($name, $default = null)
    {
        return $this->config[$name] ?? $default;
    }
}
