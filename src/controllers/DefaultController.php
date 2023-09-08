<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function create_account() {
        $this->render('create_account');
    }

    public function home() {
        $this->render('home');
    }

    public function index() {
        $this->render('login');
    }
    public function showOffer(){
        $this->render('showOffer');
    }

    public function addOffer(){
        if ($this->isUserLoggedIn()){
            $this->render('add-offer');
        }
    }

    protected function isUserLoggedIn(){
        if (isset($_COOKIE['email']) && isset($_COOKIE['password']))
        {
            $email = $COOKIE['email'];
            $password = $_COOKIE['password'];

            $userRepository = new UserRepository();
            $user = $userRepository->getUser($email);

            if (!password_verify($password, $user->getPassword())){
                return $this->render('login', ['messages' => ['Wrong password!!!']]);
            }
            return true;
        }
        return $this->render('login', []);
    }
}