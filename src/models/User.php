<?php

class User{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $phone;
    private $permissions;

    public function __construct(string $name, string $surname, string $email, string $password, string $permissions){
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->permissions = $permissions;

    }

    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail(string $name){
        $this->name = $name;
    }

    public function getPassword(): string{
        return $this->password;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }

    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name){
        $this->name = $name;
    }

    public function getSurname(): string{
        return $this->surname;
    }
    public function setSurname(string $surname){
        $this->surname = $surname;
    }

    public function getPhone(): string{
        return $this->phone;
    }
    public function setPhone(string $phone){
        $this->phone = $phone;
    }

    public function getPermissions(): string{
        return $this->permissions;
    }
    public function setPermissions(string $permissions){
        $this->permissions = $permissions;
    }

}