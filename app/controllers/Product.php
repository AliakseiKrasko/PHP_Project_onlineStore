<<<<<<< HEAD
<?php
    class Product extends Controller {
        public function index($id) {
            $product = $this->model('Products');
            $this->view('product/index', $product->getOneProduct($id));
        }
=======
<?php
    class Product extends Controller {
        public function index($id) {
            $product = $this->model('Products');
            $this->view('product/index', $product->getOneProduct($id));
        }
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
    }