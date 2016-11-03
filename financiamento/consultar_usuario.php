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
        <title>Consultar Usuarios</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($_POST["nome"] == "" && $_POST["login"] == "") {
                                $sql = "SELECT `login`, `nome_completo` FROM `usuario` WHERE status = 1 ";
                            } else {
                                $sql = "SELECT `login`, `senha`, `nome_completo` FROM `usuario` WHERE nome_completo = '" . $_POST["nome"] . "' OR login = '" . $_POST["login"] . "' AND status = 1";
                            }
                            $result = mysqli_query($con, $sql); /* executa a query */
                            ?>
                            <fieldset>
                                <legend><b>Lista de Usuários</b></legend>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><b>Login</b></td>
                                    </tr>
                                    <?php
                                    //Lista dados
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="exibir_usuario.php?nome=<?php echo $row['nome_completo']; ?>"><?php echo $row['nome_completo']; ?></a>
                                            </td>
                                            <td>
                                                <?php echo $row['login']; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="consulta_user"action="consultar_usuario.php" method="post" class="form-horizontal">
                                <h3>Entre com os dados do usuario</h3>
                                <br>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Nome</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="nome" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-1 control-label">Login</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="login" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button type="submit" name="submit" class="btn btn-primary">Consultar</button>
                                        </div>
                                        <div class="col-md-10">
                                            <button type="reset" class="btn btn-primary">Resetar Campos</button>
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