<?php
class Product
{

  private $Id_Product;
  private $Name;
  private $Description;
  private $Is_Deleted;
  private $Provider;
  private $Stock;


  public function __construct($Id_Product, $Name, $Description, $Provider, $Stock)
  {
    $this->Id_Product = $Id_Product;
    $this->Name = $Name;
    $this->Description = $Description;
    $this->Description = $Description;
    $this->Provider = $Provider;
  }
  

  public function getId()
  {
    return $this->Id_Product;
  }
  public function setId($id)
  {
    $this->Id_Product = $id;
  }

}
