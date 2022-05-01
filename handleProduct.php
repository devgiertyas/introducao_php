<?php
include_once "interface.php";

$id = @$_GET["id"];
$name = @$_GET["name"];
$description = @$_GET["description"];
$provider = @$_GET["provider"];
$price  = @$_GET["price"];
$stock = @$_GET["stock"];


 $product= new Product($id,$name,$description, $provider);

$dao = $factory->getProductDao();

if(intval($id) == 0)
{
    $idProdutct = $dao->Create($product);

    if($idProdutct)
    {
        $daoStock = $factory->getProductStockDao();
        $stockModel = new ProductStock($idProdutct, $stock, $price);
        $daoStock->create($stockModel);
    }

}
else
 {
  $dao->UpdateById($product);

  $daoStock = $factory->getProductStockDao();
  $stockModel = new ProductStock($id , $stock, $price);
  $daoStock->updateByProduct($stockModel);

}

header("Location: products.php");
exit;

?>