<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Realizar Mudanças</title>
    </head>
    <body> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";

        if (isset($_POST["submit"])) {
            $pesquisa = $_POST["nome"];
            $sql = "UPDATE usuario SET login = '" . $_POST['login'] . "', senha = '" . $_POST['senha'] . "', pais = '" . $_POST['pais'] . "', cidade = '" . $_POST['cidade'] . "', estado = '" . $_POST['estado'] . "', endereco = '" . $_POST['endereco'] . "', email = '" . $_POST['email'] . "', categoria = '" . $_POST['categoria'] . "' WHERE login = '" . $pesquisa . "'";
            echo($sql);
            mysqli_query($con, $sql); /* executa a query */
            mysqli_close($con);
        } else {
            $pesquisa = $_GET["nome"];
            ?>
            <h3>Entre com seus dados</h3>
            <form id="cadastra_user"action="mudancas_usuario.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Login</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="login" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-6">
                        <input type="password" id="pass" class = "form-control" name="senha" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">País</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="pais" />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Cidade</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="cidade" />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Estado</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="estado" />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Endereço</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="endereco" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class = "form-control" name="email" />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-6" >
                        <input type="radio" id="pesq" value="Pesquisa" name="categoria" /> Pesquisa<br>
                        <input type="radio" id="comp" value="Competição Tecnológica" name="categoria" /> Competição Tecnológica<br>
                        <input type="radio" id="inov" value="Inovação no Ensino" name="categoria" /> Inovação no Ensino<br>
                        <input type="radio" id="manu" value="Manutenção e Reforma" name="categoria" /> Manutenção e Reforma<br>
                        <input type="radio" id="pequ" value="Pequenas Obras" name="categoria" /> Pequenas Obras<br>
                    </div>
                </div>
                <div class="form-group">
                    <br/>
                    <label  class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <input type="hidden" value="<?php echo $pesquisa ?>" name="nome">
                        <input type="submit" name="submit" /> <input type="reset"/>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
    </body>
</html>