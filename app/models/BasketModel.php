<?php
session_start();

class BasketModel {
    private $session_name = 'cart';

    public function isSetSession() {
        return isset($_SESSION[$this->session_name]) && is_array($_SESSION[$this->session_name]) && !empty($_SESSION[$this->session_name]);
    }

    public function deleteSession() {
        unset($_SESSION[$this->session_name]);
    }

    public function getSession() {
        return isset($_SESSION[$this->session_name]) ? $_SESSION[$this->session_name] : [];
    }

    public function addToCart($itemID) {
        // Инициализация корзины как массива, если она еще не существует
        if (!isset($_SESSION[$this->session_name]) || !is_array($_SESSION[$this->session_name])) {
            $_SESSION[$this->session_name] = [];  // Инициализация корзины как пустого массива
        }

        // Если товар уже есть в корзине, не добавляем его повторно
        if (!in_array($itemID, $_SESSION[$this->session_name])) {
            $_SESSION[$this->session_name][] = $itemID;
        }
    }

    public function removeFromCart($itemID) {
        if ($this->isSetSession()) {
            $_SESSION[$this->session_name] = array_filter(
                $_SESSION[$this->session_name],
                function($id) use ($itemID) {
                    return $id != $itemID;
                }
            );
        }
    }

    public function countItems() {
        if (!$this->isSetSession()) {
            return 0;
        }

        return count($_SESSION[$this->session_name]);
    }
}
