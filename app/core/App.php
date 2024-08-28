<?php
class App {

<<<<<<< HEAD
    protected $controller = 'Home';
    protected $method = 'index';
=======
    protected $controller = 'Home'; // Контроллер по умолчанию
    protected $method = 'index'; // Метод по умолчанию
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

<<<<<<< HEAD
        if ($url && file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once 'app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if ($url && isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
=======
        if (isset($url[0])) {
            $potentialController = ucfirst($url[0]);

            // Проверка на существование контроллера
            if (file_exists('app/controllers/' . $potentialController . '.php')) {
                $this->controller = $potentialController;
                unset($url[0]);
            }
        }

        require_once 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($url[1])) {
            $potentialMethod = $url[1];

            // Проверка на существование метода
            if (method_exists($this->controller, $potentialMethod)) {
                $this->method = $potentialMethod;
                unset($url[1]);
            } else {
                // Если метод не найден, перенаправляем на 404
                require_once 'app/controllers/NotFound.php';
                $this->controller = new NotFound();
                $this->method = 'index';
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
            }
        }

        $this->params = $url ? array_values($url) : [];
<<<<<<< HEAD
=======

>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(
                rtrim($_GET['url'], '/'),
<<<<<<< HEAD
                FILTER_SANITIZE_STRING
            ));
        }
        return null; // Возвращаем null, если 'url' не установлен
    }
}
=======
                FILTER_SANITIZE_URL
            ));
        }
        return [];
    }
}

>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
