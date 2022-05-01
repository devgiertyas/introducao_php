<?php
// layout do cabeçalho
include_once "header.php";
?>


<section>
    <form action="handleLogin.php" method="POST" role="form">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" >
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</section>
<?php
// layout do rodapé
?>