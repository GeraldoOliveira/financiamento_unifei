<?php
$cod = $_GET["nome"];
include "../financiamento/conexao.php";
    $sql = "DELETE FROM projeto_candidato WHERE cod_projeto = " . $cod . "";
    echo($sql);
    mysqli_query($con, $sql);
?>
<h3>O projeto foi excluído com sucesso.</h3>
        <h4><a href="excluir_projeto.php.php">Nova exclusão</a></h4>
                
                <h4><a href="index.php">Voltar</a></h4>
    
    