<<<<<<< HEAD
<?php
    class Categories extends Controller {
        public function index() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProducts(), 'title' => 'Все товары на сайте'];
            $this->view('categories/index', $data);
        }

        public function shoes() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shoes'), 'title' => 'Категория обувь'];
            $this->view('categories/index', $data);
        }

        public function hats() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('hats'), 'title' => 'Категория кепки'];
            $this->view('categories/index', $data);
        }

        public function shirts() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shirts'), 'title' => 'Категория футболки'];
            $this->view('categories/index', $data);
        }

        public function watches() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Категория часы'];
            $this->view('categories/index', $data);
        }
=======
<?php
    class Categories extends Controller {
        public function index() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProducts(), 'title' => 'Все товары на сайте'];
            $this->view('categories/index', $data);
        }

        public function shoes() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('shoes'), 'title' => 'Категория обувь'];
            $this->view('categories/index', $data);
        }

        public function hats() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('hats'), 'title' => 'Категория кепки'];
            $this->view('categories/index', $data);
        }

        public function tshirt() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('tshirt'), 'title' => 'Категория футболки'];
            $this->view('categories/index', $data);
        }

        public function watches() {
            $products = $this->model('Products');
            $data = ['products' => $products->getProductsCategory('watches'), 'title' => 'Категория часы'];
            $this->view('categories/index', $data);
        }
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
    }