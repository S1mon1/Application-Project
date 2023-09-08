<?php

require_once "Repository.php";
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM public.users U JOIN public.users_details UD
            ON U.id_user_details = UD.id  WHERE email = :email'
        );
        
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user == false){
            return null;
        }
        return new User(
            $user['name'],
            $user['surname'],
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    public function addUser(User $user)
    {

        $stmt = $this->database->connect()->prepare('
        INSERT INTO users_details (name, surname, phone) VALUES (?, ?, ?)');
        $user->setPhone("222");
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getPhone()
        ]);

        $stmt = $this->database->connect()->prepare('
        INSERT INTO users (email, password, id_user_details) VALUES (?, ?, ?)');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsID($user)
        ]);
    }

    public function getUserDetailsID(User $user): int{
        $name = $user->getName();
        $surname = $user->getSurname();
        $phone = $user->getPhone();

        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.users_details WHERE name = :name AND surname = :surname AND phone = :phone');

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

    public function getUserId(string $email): ?int
    {
        $stmt = $this->database->connect()->prepare('
        SELECT id FROM public.users WHERE email = :email');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $userId = $stmt->fetchColumn();

        if ($userId === false){
            return null;
        }
        return (int)$userId;
    }
}

