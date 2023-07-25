<?php
class avis {
    private $idA;
    private $rating;
    private $name;
    private $location;
    private $title;
    private $review;
    private $id;
  
    public function __construct($idA,$rating, $name, $location, $title, $review, $id) {
      $this->$idA = $idA;
      $this->rating = $rating;
      $this->name = $name;
      $this->location = $location;
      $this->title = $title;
      $this->review = $review;
      $this->review = $id;
    }
  
    public function getIdA() {
      return $this->idA;
    }
  
    public function getRating() {
      return $this->rating;
    }
  
    public function getName() {
      return $this->name;
    }
  
    public function getLocation() {
      return $this->location;
    }
  
    public function getTitle() {
      return $this->title;
    }
  
    public function getReview() {
      return $this->review;
    
    }
    public function getid() {
      return $this->id;
    }
  }
  ?>