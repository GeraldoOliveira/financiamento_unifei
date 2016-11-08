<?php

    // Pegar os campos do formulario de login
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    
    // Montar o SQL para pesquisar
    $db = mysql_connect("localhost", "root");
    mysql_select_db("financiamento");
    $sql = "SELECT * FROM usuario WHERE login = '" . $login . "'";
    $result = mysql_query($sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
    
        // Cria a sessão
        session_start();
        $_SESSION["login"] = $row["login"];
        $_SESSION["nome"] = $row["nome"];
        header("Location:../view/home.php");
        
    } else {
        
    // Login e senha NAO conferem
        header("Location:../view/formlogin.php?erro=Dados inválidos.");
    }


    // Cria a Sessão
?>