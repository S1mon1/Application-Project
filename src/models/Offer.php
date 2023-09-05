<?php

class Offer{
    private $title;
    private $model;
    private $description;
    private $image;

    public function __construct($title, $model, $description, $image){
        $this->title = $title;
        $this->model = $model;
        $this->description = $description;
        $this->image = $image;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function setTitle(string $title){
        $this->title = $title;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }
    public function getImage(): string{
        return $this->image;
    }

    public function setImage(string $image){
        $this->image = $image;
    }

    public function getModel(): string{
        return $this->model;
    }

    public function setModel(string $model){
        $this->model = $model;
    }
}
