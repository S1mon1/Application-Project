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
            $offer['description'],
            $offer['image']
        );
    }
4,14
    public function addOffer(Offer $offer): void
    {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO offers (brand, model, description, id_assigned_by, image) VALUES (?, ?, ?, ?, ?)
            ');
        $assignedById = 1;
        $example_model = 'model';
        $stmt->execute([
            $offer->getTitle(),
            $example_model,
            $offer->getDescription(),
            $assignedById,
            $offer->getImage()
        ]);
    }
}