<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    
    public function create_account() {
        $this->render('create_account');
    }

    public function offers() {
        $this->render('offer');
    }

    public function home() {
        $this->render('home');
    }

    public function login() {
        $this->render('index');
    }
}