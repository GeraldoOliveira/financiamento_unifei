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
            if ($_POST["nome"] == "" && $_POST["login"] == "") {
                $sql = "SELECT `login`, `nome_completo` FROM `usuario` WHERE 1";
            } else {
                $sql = "SELECT `login`, `senha`, `nome_completo` FROM `usuario` WHERE nome_completo = '" . $_POST["nome"] . "' OR login = '" . $_POST["login"] . "'";
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
                                <a href="exibir_user.php"><?php echo $row['nome_completo']; ?></a>
                            </td>
                            <td>
                                <?php echo $row['login']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </fieldset>
            <?php
        } else {
            ?>
            <h3>&nbsp;Entre com os filtros</h3>
            <form id="consulta_user"action="consultar_usuario.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="nome" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Login</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="login" /> 
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