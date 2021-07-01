<?php

class DB
{
    private static $instance;

    public static function get_instance()
    {
        include __DIR__ . "/../../config/config.php";
        if (!self::$instance) {
            self::$instance = new PDO(
                "mysql:dbname=Library",
                "Library",
                "library",
            );
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}