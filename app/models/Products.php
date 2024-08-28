<?php
require 'DB.php';

class Products {
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance(); // Изменено на getInstance
    }

    public function getProducts() {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsLimited($order, $limit) {
        $result = $this->_db->query("SELECT * FROM `products` ORDER BY $order DESC LIMIT $limit");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsCategory($category) {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOneProduct($id) {
        $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsCart($items) {
        // Проверяем, что $items является массивом и не пустой
        if (empty($items) || !is_array($items)) {
            return [];
        }
        
        // Создаем плейсхолдеры для запроса (например, ?, ?, ?)
        $placeholders = implode(',', array_fill(0, count($items), '?'));
        
        // Подготавливаем запрос с использованием плейсхолдеров
        $stmt = $this->_db->prepare("SELECT * FROM `products` WHERE `id` IN ($placeholders)");
        
        // Выполняем запрос с массивом идентификаторов
        $stmt->execute(array_values($items));
        
        // Возвращаем все найденные товары
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

}
