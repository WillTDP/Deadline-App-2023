<?php
 class Db {
    private static $conn;
    public static function connect() {
        include_once(__DIR__ . "/../settings/settings.php");
        if (empty(self::$conn)) {
            self::$conn = new PDO('mysql:host=' . SETTINGS['db']['host'] . ';dbname=' . SETTINGS['db']['db'], SETTINGS['db']['user'], SETTINGS['db']['password']);
            return self::$conn;
        } else {
            return self::$conn;
        }
    }
 }