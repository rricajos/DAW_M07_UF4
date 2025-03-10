<?php

class Book
{
  private $title;
  private $author;
  private $category;
  private $isbn; 
  private $edition;
  private $promotion; 
  private $releaseDate;   
  private $cover;

  public function __construct($title, $author, $category, $isbn, $edition, $promotion, $releaseDate, $cover)
  {
    $this->title = $title;
    $this->author = $author;
    $this->category = $category;
    $this->isbn = $isbn;
    $this->edition = $edition;
    $this->promotion = $promotion;
    $this->releaseDate = $releaseDate;
    $this->cover = $cover;
  }

  // Getters and setters for each property

  public function getTitle()
  {
    return $this->title;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getAuthor()
  {
    return $this->author;
  }
  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function getCategory()
  {
    return $this->category;
  }
  public function setCategory($category)
  {
    $this->category = $category;
  }

  public function getIsbn()
  {
    return $this->isbn;
  }
  public function setIsbn($isbn)
  {
    $this->isbn = $isbn;
  }

  public function getEdition()
  {
    return $this->edition;
  }
  public function setEdition($edition)
  {
    $this->edition = $edition;
  }

  public function isPromotion()
  {
    return $this->promotion;
  }
  public function setPromotion($promotion)
  {
    $this->promotion = $promotion;
  }

  public function getReleaseDate(): DateTime
  {
    return $this->releaseDate;
  }
  public function setReleaseDate(DateTime $releaseDate)
  {
    $this->releaseDate = $releaseDate;
  }

  public function getCover()
  {
    return $this->cover;
  }
  public function setCover($cover)
  {
    $this->cover = $cover;
  }
}
