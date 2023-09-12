<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController{

    public function login(){

        $userRepository = new UserRepository();


        if(!$this->isPost()){
            $this->DeleteCookies();
            return $this->render('login');
            
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $userRepository->getUser($email);
        
        if(!$user){
            return $this->render('login', ['messages' => ['User not exist!']]); 
        }

        if ($user->getEmail() !== $email){
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        //return $this->render('offer');
        $url = "http://$_SERVER[HTTP_HOST]";
        $this->Cookies($password, $user);
        header("Location: {$url}/offers");
    }

    public function register()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->render('create_account');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        if ($password !== $confirmedPassword){
            return $this->render('create_account', ['messages' => 'Wrong passwords!']);
        }

        $hashpassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($name, $surname, $email, $hashpassword, $name, $surname);
        $userRepository->addUser($user);

        return $this->render('login', ['messages' => ['Registrated']]);
    }

    public function Cookies($password, $user){
        $time = time() + 3600;
        setcookie("email", $user->getEmail(), $time, "/");
        setcookie("password", $password, $time, "/");
        setcookie("name", $user->getName(), $time, "/");
        setcookie("surname", $user->getSurname(), $time, "/");
        setcookie("permissions", $user->getPermissions(), $time, "/");
    }

    public function DeleteCookies(){
        setcookie("email");
        setcookie("password");
        setcookie("name");
        setcookie("surname");
        setcookie("permissions");
    }
}