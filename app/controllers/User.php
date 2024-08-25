<?php
    class User extends Controller {
        public function reg() {

            $data = [];
            if(isset($_POST['name'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);

                $isValid = $user->validForm();
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }

            $this->view('user/reg', $data);
        }

        public function dashboard() {
            $user = $this->model('UserModel');
            $this->view('user/dashboard', $user->getUser());
        }
    }