<?php

include_once('ProductDAO.php');
include_once('PostgresDAO.php');


class PostgresProductDao extends PostgresDAO implements ProductDAO
{

  private $table_name = 'product';

  public function Create($product)
  {

    $query = "INSERT INTO " . $this->table_name .
      " (name, description, id_provider) VALUES" .
      " (:name, :description, :id_provider )";

    $stmt = $this->conn->prepare($query);

    // bind values 
    $stmt->bindValue(":name", $product->getName());
    $stmt->bindValue(":description", $product->getDescription());
    $stmt->bindValue(":id_provider", $product->getProvider());

    if ($stmt->execute()) {

      return $this->conn->lastInsertId();
    } else {
      return false;
    }
  }

  public function getProducts()
  {
    $products = array();

    $query = "SELECT product.id_product, product.name, product.description, provider.id_provider, provider.name as NameProvider, ps.quantity, ps.price FROM
              " . $this->table_name . " INNER JOIN provider on provider.id_provider = product.id_provider" .
      " LEFT JOIN product_stock as ps on product.id_product = ps.id_product" .
      " WHERE product.is_deleted = false ORDER BY product.id_product ASC";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $products[] = $row;
    }

    return $products;
  }

  public function getById($idProduct)
  {
    $product = null;

    $query = "SELECT product.id_product, product.name, product.description, provider.id_provider, provider.name as NameProvider, ps.quantity, ps.price FROM
    " . $this->table_name . " INNER JOIN provider on provider.id_provider = product.id_provider" .
      " LEFT JOIN product_stock as ps on product.id_product = ps.id_product" .
      " WHERE product.id_product = ? and product.is_deleted = false";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $idProduct);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      $product = $row;
    }

    return $product;
  }

  public function updateById($product)
  {
    $query = "UPDATE " . $this->table_name .
      " SET name = :name, description = :description, id_provider = :id_provider" .
      " WHERE id_product = :id_product";

    $stmt = $this->conn->prepare($query);

    // bind parameters
    $stmt->bindValue(":name", $product->getName());
    $stmt->bindValue(":description", $product->getDescription());
    $stmt->bindValue(':id_provider', $product->getProvider());
    $stmt->bindValue(':id_product', $product->getId());


    // execute the query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }
}
