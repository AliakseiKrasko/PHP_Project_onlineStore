<?php
    class Contact extends Controller {
        public function index() {
<<<<<<< HEAD

            $data = [];
            if(isset($_POST['name'])) {
                $mail = $this->model('ContactModel');
=======
            $data = [];
            if(isset($_POST['name'])) {
                $mail = $this->model('ContactForm');
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
                $mail->setData($_POST['name'], $_POST['email'], $_POST['age'], $_POST['message']);

                $isValid = $mail->validForm();
                if($isValid == "Верно")
                    $data['message'] = $mail->mail();
                else
                    $data['message'] = $isValid;
            }

<<<<<<< HEAD
            $this->view("contact/index", $data);
        }

        public function about() {
            $this->view("contact/about");
=======
            $this->view('contact/index', $data);
        }

        public function about() {
            $this->view('contact/about');
>>>>>>> 1b0c10aea21433f5a1ccce6ddf004801ea02731f
        }
    }