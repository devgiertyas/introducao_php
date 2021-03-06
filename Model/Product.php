<?php
class Product
{

  private $Id_Product;
  private $Name;
  private $Description;
  private $Is_Deleted;
  private $Provider;
  private $Stock;


  public function __construct($Id_Product, $Name, $Description, $Provider)
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

  public function getName()
  {
    return $this->Name;
  }
  public function setName($name)
  {
    $this->Name = $name;
  }

  public function getDescription()
  {
    return $this->Description;
  }
  public function setDescription($description)
  {
    $this->Description = $description;
  }

  public function getProvider()
  {
    return $this->Provider;
  }
  public function setProvider($provider)
  {
    $this->Provider = $provider;
  }

}
