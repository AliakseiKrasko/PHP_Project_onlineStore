<?php
class App {

    protected $controller = 'Home'; // Контроллер по умолчанию
    protected $method = 'index'; // Метод по умолчанию
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

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
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(
                rtrim($_GET['url'], '/'),
                FILTER_SANITIZE_URL
            ));
        }
        return [];
    }
}

