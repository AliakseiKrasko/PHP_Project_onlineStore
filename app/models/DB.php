<<<<<<< HEAD
<?php
class DB {
    private static $_db = null;

    public static function getInstance() {  // Исправление: правильное название метода
        if (self::$_db == null) {
            try {
                self::$_db = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '992301');
                self::$_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }

        return self::$_db;
    }

    private function __construct() {}
    private function __clone() {}

    // Метод __wakeup должен быть публичным, чтобы избежать предупреждений
    public function __wakeup() {
        // Если нужно восстановить состояние объекта, сделайте это здесь
    }
}
=======
<?php
    class DB {
        private static $_db = null;

        public static function getInstence() {
            if(self::$_db == null)
            self::$_db = new PDO('mysql:host=localhost;dbname=ecommerce', username:'root', password:'992301');

            return self::$_db;
        }

        private function __construct() {}
        private function __clone() {}
        public function __wakeup() {}
    }
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
