<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Consultar Usuarios</title>
    </head>
    <body> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            $sql = "SELECT `login`, `senha` FROM `usuario` WHERE login = '" . $_POST['login'] . "'";
            $result = mysqli_query($con, $sql); /* executa a query */
            
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                if($_POST['senha'] == $row['senha']){?>
                    <a href="mudancas_usuario.php?nome=<?php echo $row['login']; ?>">Alterar dados</a>
                <?php } else{
                    header('Location: alterar_usuario.php'); ?>
                    <script> alert("Senha incorreta") </script>
                <?php 
                }
            }  
        } else {
            ?>
            <h3>&nbsp;Entre com os dados a pesquisar</h3>
            <form id="consulta_user"action="alterar_usuario.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Login</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="login" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-6">
                        <input type="password" class = "form-control" name="senha" /> 
                    </div>
                </div>
                <div class="form-group">
                    <br/>
                    <label  class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <input type="submit" name="submit" /> <input type="reset" />
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
    </body>
</html>