<?php
class Basket extends Controller {
    public function index() {
        $data = [];
        $cart = $this->model('BasketModel');

        if (isset($_POST['item_id'])) {
            $cart->addToCart($_POST['item_id']);
        }

        if (!$cart->isSetSession()) {
            $data['empty'] = 'Пустая корзина';
            $data['products'] = []; // Инициализируем как пустой массив
        } else {
            $productsModel = $this->model('Products');
            $productIds = $cart->getSession();
            $data['products'] = $productsModel->getProductsCart($productIds);
        }

        $this->view('basket/index', $data);
    }

    public function remove() {
        if (isset($_POST['item_id'])) {
            $cart = $this->model('BasketModel');
            $cart->removeFromCart($_POST['item_id']);
        }
        header('Location: /basket');
    }

    public function clear() {
        $cart = $this->model('BasketModel');
        $cart->deleteSession();
        header('Location: /basket');
    }
}
