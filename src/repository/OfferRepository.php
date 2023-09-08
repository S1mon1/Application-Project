<?php

require_once "Repository.php";
require_once __DIR__.'/../models/Offer.php';

class OfferRepository extends Repository{

    public function getOffer(int $id): ?Offer
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM offers WHERE id = :id'
        );
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $offer = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($offer == false){
            return null;
        }
        return new Offer(
            $offer['title'],
            $offer['model'],
            $offer['description'],
            $offer['image']
        );
    }

    public function getOffers(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM offers ORDER BY id'
        );
        $stmt->execute();
        $offers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($offers as $offer){
            $result[] = new Offer(
                $offer['brand'],
                $offer['model'],
                $offer['description'],
                $offer['image']
            );
        }
        
        return $result;
    }

    public function addOffer(Offer $offer): void
    {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO offers (brand, model, description, image, id_assigned_by) VALUES (?, ?, ?, ?, ?)
            ');

        $userRepository = new UserRepository();
        if (isset($_COOKIE['email'])){
            $assignedById = $userRepository->getUserID($_COOKIE['email']);
        }
        else{
            return;
        }

        $stmt->execute([
            $offer->getTitle(),
            $offer->getModel(),
            $offer->getDescription(),
            $offer->getImage(),
            $assignedById
        ]);
    }

    public function getOfferByBrand(string $searchString)
    {
        $searchString = '%'.strtolower($searchString).'%';
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM offers WHERE LOWER(brand) LIKE :search or LOWER(model) LIKE :search or LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

    public function getUsersOffer(int $id): ?Offer
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT * FROM offers WHERE id_assigned_by = :id'
        );
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $offer = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($offer == false){
            return null;
        }
        return new Offer(
            $offer['title'],
            $offer['model'],
            $offer['description'],
            $offer['image']
        );
    }
}