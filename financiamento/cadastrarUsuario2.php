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

        <script src="js/jquery-3.1.1.slim.min.js" type="text/javascript"></script>
        <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
        <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
        <title>Cadastrar Usuarioe</title>
        <script>

            jQuery(function ($) {
                $("#nasc").mask("99-99-9999", {placeholder: " "});
                $("#cpf").mask("999.999.999-99", {placeholder: " "});
            });
            var cc = 0;
            function confirma_pass() {
                var pass = document.getElementById("pass").value;
                var cpass = document.getElementById("c_pass").value;
                if (pass != cpass) {
                    alert("Senhas não conferem");
                    document.getElementById("pass").focus();
                    //variavel pra ver se já entrou aqui
                    cc = cc + 1;
                }
            }
        </script>
    </head>
    <body> 
        <?php
        include_once 'header.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            session_start();
                            $user = $_POST['login'];
                            $pesquisa = $_POST['nome'];
                            $_SESSION['nome'] = $pesquisa;
                            $_SESSION['login'] = $user;
                            $data = date_create($_POST['nascimento']);
                            $c_data = date_format($data, "Y/m/d");
                            $sql = "INSERT INTO usuario VALUES('" . $_POST["login"] . "','" .
                                    $_POST["senha"] . "','" . $_POST["nome"] . "','" . $_POST["cpf"] .
                                    "','" . $_POST["pais"] . "','" .
                                    $_POST["cidade"] . "','" .
                                    $_POST["estado"] . "','" .
                                    $_POST["endereco"] . "','" .
                                    $c_data . "','" .
                                    $_POST["email"] . "','" .
                                    $_POST["tipo"] . "','" .
                                    $_POST["categoria"] . "', 1 )";
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>Usuário cadastrado com sucesso.</h3>
                            <div class="row">
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="index.php">Logar</a>
                                </div>
                            </div>

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
                            <h3>Entre com os dados do usuário</h3>
                            <form id="cadastra_user"action="cadastrarUsuario2.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Login</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="login" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Senha</label>
                                    <div class="col-sm-6">
                                        <input type="password" id="pass" class = "form-control" name="senha" required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Confirma Senha</label>
                                    <div class="col-sm-6">
                                        <input type="password" id="c_pass" class = "form-control" name="c_senha" onblur="confirma_pass()"required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nome completo</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="nome" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">CPF</label>
                                    <div class="col-sm-6">
                                        <input type="text" class ="form-control" name="cpf" id="cpf"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">País</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="pais" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Cidade</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="cidade" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="estado" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="endereco" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data de nascimento</label>
                                    <div class="col-sm-6">
                                        <input type="date" class ="form-control" name="nascimento" id="nasc"required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class = "form-control" name="email" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Tipo</label>
                                    <div class="col-sm-6">
                                        <input type="radio" id="usrpublic" value="Usuário Público" name="tipo" 
                                               required/> Usuário Público<br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label"></label>
                                    <div class="col-sm-6" >
                                        <input type="hidden" id="vazio" value="N/A" name="categoria" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
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