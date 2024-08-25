<?php
    require 'DB.php';
    
    
    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstence();
        }

        public function setData($name, $email, $pass, $re_pass) {
            $this->name = $name;
            $this->email = $email;
            $this->pass = $pass;
            $this->re_pass = $re_pass;
        }

        public function validForm() {
            if(strlen($this->name) < 3)
                return "Имя слишком короткое";
            else if(strlen($this->email) < 3)
                return "Email слишком короткий";
            else if(strlen($this->pass) < 3)
                return "Пороль не менее 3 символов";
            else if($this->pass != $this->re_pass)
                return "Пороли не совпадают";
            else
                return "Верно";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass) VALUES(:name, :email, :pass)';
            $query = $this->_db->prepare($sql);
        
            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        
            // Обратите внимание на то, что ключи в массиве должны соответствовать параметрам в SQL-запросе
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass]);
        
            setcookie('login', $this->email, time() + 3600, '/');
            header('Location: /user/dashboard');
        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }