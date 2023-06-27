<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Offer.php';
require_once __DIR__.'/../repository/OfferRepository.php';

class OfferController extends AppController{

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $message = [];
    private $offerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->offerRepository = new OfferRepository;
    }

    public function addOffer(){

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);

            $offers = new Offer($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->offerRepository->addOffer($offers);

            return $this->render('offer', ['messages' => $this->message, 'offers' => $offers]);
        }

        return $this->render('add-offer', ['messages' => $this->message]);
    }

    private function validate(array $file):bool
    {

        if($file['size'] > self::MAX_FILE_SIZE)
        {
            $this->messages[] = 'File is too large for destination file system';
            return false;
        }
        if(isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES))
        {
            $this->messages[] = 'File type is not supported';
            return false;
        }
        return true;
    }
}