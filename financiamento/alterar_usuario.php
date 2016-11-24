<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
              rel="stylesheet" type="text/css">
        <title>Alterar Usuarios</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql = "SELECT `login`, `senha` FROM `usuario` WHERE login = '" . $_POST['login'] . "'";
                            $result = mysqli_query($con, $sql); /* executa a query */

                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                if ($_POST['senha'] == $row['senha']) {
                                    ?>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-primary" href="mudancas_usuario.php?nome=<?php echo $row['login']; ?>">Alterar Dados</a>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?><h4>Senha incorreta.</h4>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <a class="btn btn-primary" href="alterar_usuario.php">Voltar</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Confirme login e senha</h3>
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
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button type="submit" name="submit" class="btn btn-primary">Confirmar</button>
                                        </div>
                                        <div class="col-md-10">
                                             
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        include_once 'footer.php';
        ?>
    </body>
</html>