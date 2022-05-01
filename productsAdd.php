<?php
include_once "header.php";
include_once "checkLogin.php";
include_once "interface.php";
include_once "checkPermission.php";

$id = @$_GET["id"];

$daoProviders = $factory->getProviderDao();
$providers = $daoProviders->getProviders();

$product = null;

if ($id) {
    $daoProduct = $factory->getProductDao();
    $product =  $daoProduct->getById($id);
}

?>
<section>

    <div class="container mt-3">
        <div class="">
            <h5 class="card-title"> Produto</h5>
            <form action="handleProduct.php" method="get">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Nome</label>
                            <input required type="text" name="name" class="form-control" value="<?php echo is_null($product) ? "" : $product['name']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Descrição</label>
                            <input name="description" class="form-control" value="<?php echo is_null($product) ? "" : $product['description']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="provider">Fornecedor</label>
                            <select class="form-control" name="provider">
                            <option>Selecione</option>
                                <?php
                                foreach ($providers as $provider) {
                                ?>
                                    <option  value=<?=  $provider->getId();?> <?= (is_null($product) ? "" : $product['id_provider'] == $provider->getId()) ? 'selected' : '' ?>  ><?php echo $provider->getName(); ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="">Preço Produto</label>
                            <input required name="price" class="form-control" value="<?php echo is_null($product) ? "" : $product['price']; ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="">Estoque</label>
                            <input required name="stock" class="form-control" value="<?php echo is_null($product) ? "" : $product['quantity']; ?>">
                        </div>
                    </div>
                </div>

        </div>
        <input type='hidden' name='id' value='<?php echo is_null($product) ? 0 : $product['id_product']; ?>' />
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>

    </div>

</section>
<?php
// layout do rodapé
?>