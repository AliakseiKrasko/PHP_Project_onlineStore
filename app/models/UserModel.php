<<<<<<< HEAD
<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $email;
        private $pass;
        private $re_pass;

        private $_db = null;

        public function __construct() {
            $this->_db = DB::getInstance(); 
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
                return "Пароль не менее 3 символов";
            else if($this->pass != $this->re_pass)
                return "Пароли не совпадают";
            else
                return "Верно";
        }

        public function addUser() {
            $sql = 'INSERT INTO users(name, email, pass) VALUES(:name, :email, :pass)';
            $query = $this->_db->prepare($sql);

            $pass = password_hash($this->pass, PASSWORD_DEFAULT);
            $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass]);

            $this->setAuth($this->email);
        }

        public function getUser() {
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        public function logOut() {
            setcookie('login', $this->email, time() - 3600, '/');
            unset($_COOKIE['login']);
            header('Location: /user/auth');
        }

        public function auth($email, $pass) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['email'] == '')
                return 'Пользователя с таким email не существует';
            else if(password_verify($pass, $user['pass']))
                $this->setAuth($email);
            else
                return 'Пароли не совпадают';
        }

        public function setAuth($email) {
            setcookie('login', $email, time() + 3600, '/');
            header('Location: /user/dashboard');
        }

        // Функция для добавления фото
        public function addFotoToUser($filename) {
            // Обновляем поле с фото для пользователя с определенным email
            $sql = "UPDATE `users` SET `photo` = :photo WHERE `email` = :email";
            $query = $this->_db->prepare($sql);
        
            // В качестве фото указываем имя файла, что загрузили
            // В качестве email указываем тот, что находится в куки
            $query->execute(['photo' => $filename, 'email' => $_COOKIE['login']]);
        }
        

    }
=======
<?php
require 'DB.php';

class UserModel {
    private $name;
    private $email;
    private $pass;
    private $re_pass;

    private $_db = null;

    public function __construct() {
        session_start(); // Стартуем сессию
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
    
        $query->execute(['name' => $this->name, 'email' => $this->email, 'pass' => $pass]);
    
        $this->setAuth($this->email, $this->_db->lastInsertId()); // Передаем ID пользователя
    }

    public function getUser() {
        if (isset($_COOKIE['login'])) {  // Проверяем, существует ли кука 'login'
            $email = $_COOKIE['login'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            // Если кука не установлена, можно возвращать null или другой показатель того, что пользователь не найден
            return null;
        }
    }

    public function logOut() {
        setcookie('login', $this->email, time() - 3600, '/');
        unset($_COOKIE['login']);
        session_unset();
        session_destroy();
        header('Location: /user/auth');
    }

    public function auth($email, $pass) {
        $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if($user['email'] == '')
            return "Пользователь не найден";
        else if(password_verify($pass, $user['pass'])) {
            $this->setAuth($email, $user['id']); // Передаем ID пользователя
            return "Верно";
        } else 
            return 'Пороли не совпадают';
    }

    public function setAuth($email, $userId) {
        // Установка сессии вместо куки
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_email'] = $email;

        // Перенаправление на страницу пользователя
        header('Location: /user/dashboard');
    }
}
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
