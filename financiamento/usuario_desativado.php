<h4>Usuário desativado com sucesso</h4>
<?php
    include "../financiamento/conexao.php";
    $sql = "UPDATE usuario SET status = 'inativo' WHERE codigo = 1 ";
    mysqli_query($con, $sql);

