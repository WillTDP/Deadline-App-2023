<?php
 class Db {
    private static $conn;
    public static function connect() {
        if (empty(self::$conn)) {
            self::$conn = new PDO('mysql:host=localhost;dbname=deadline_app_2023', 'root', 'root');
            return self::$conn;
        } else {
            return self::$conn;
        }
    }
 }