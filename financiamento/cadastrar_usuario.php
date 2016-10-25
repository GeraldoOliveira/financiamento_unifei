<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Cadastrar Usuarios</title>
        <script>
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
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            $sql = "INSERT INTO usuario VALUES('" . $_POST["login"] . "','" .
                    $_POST["senha"] . "','" . $_POST["nome"] . "','" . $_POST["cpf"] .
                    "','" . $_POST["pais"] . "','" .
                    $_POST["cidade"] . "','" .
                    $_POST["estado"] . "','" .
                    $_POST["endereco"] . "','" .
                    $_POST["nascimento"] . "','" .
                    $_POST["email"] . "','" .
                    $_POST["tipo"] . "','" .
                    $_POST["categoria"] . "', 'ativo' )";
            mysqli_query($con, $sql); /* executa a query */
            mysqli_close($con);
            ?>
            <h3>Usuário cadastrado com sucesso.</h3>
            <h4><a href="cadastrar_usuario.php">Novo cadastro</a>
                <h4><a href="index.php">Voltar</a></h4>
        <?php
        } else {
            ?>
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entre com os dados do usuário</h3>
            <form id="cadastra_user"action="cadastrar_usuario.php" method="post" class="form-horizontal">
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
                    <label class="col-sm-2 control-label">Confirma Senha</label>
                    <div class="col-sm-6">
                        <input type="password" id="c_pass" class = "form-control" name="c_senha" onblur="confirma_pass()"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nome completo</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="nome" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">CPF</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="cpf" />
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
                    <label class="col-sm-2 control-label">Data de nascimento</label>
                    <div class="col-sm-6">
                        <input type="date" class = "form-control" name="nascimento" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class = "form-control" name="email" />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Tipo</label>
                    <div class="col-sm-6">
                        <input type="radio" id="gestr" value="Gestor de Projetos" name="tipo" 
                               onclick="
                                           if (document.getElementById('pesq').disabled == false) {
                                               document.getElementById('pesq').disabled = true
                                           }
                                           if (document.getElementById('comp').disabled == false) {
                                               document.getElementById('comp').disabled = true
                                           }
                                           if (document.getElementById('inov').disabled == false) {
                                               document.getElementById('inov').disabled = true
                                           }
                                           if (document.getElementById('manu').disabled == false) {
                                               document.getElementById('manu').disabled = true
                                           }
                                           if (document.getElementById('pequ').disabled == false) {
                                               document.getElementById('pequ').disabled = true
                                           }"/> Gestor de Projetos<br>
                        <input type="radio" id="avalid" value="Avaliador de Projetos" name="tipo" onclick="
                                    if (document.getElementById('pesq').disabled == true) {
                                        document.getElementById('pesq').disabled = false
                                    }
                                    if (document.getElementById('comp').disabled == true) {
                                        document.getElementById('comp').disabled = false
                                    }
                                    if (document.getElementById('inov').disabled == true) {
                                        document.getElementById('inov').disabled = false
                                    }
                                    if (document.getElementById('manu').disabled == true) {
                                        document.getElementById('manu').disabled = false
                                    }
                                    if (document.getElementById('pequ').disabled == true) {
                                        document.getElementById('pequ').disabled = false
                                    }"/> Avaliador de Projetos<br>
                        <input type="radio" id="financ" value="Financiador Acadêmico" name="tipo" 
                               onclick="
                                           if (document.getElementById('pesq').disabled == false) {
                                               document.getElementById('pesq').disabled = true
                                           }
                                           if (document.getElementById('comp').disabled == false) {
                                               document.getElementById('comp').disabled = true
                                           }
                                           if (document.getElementById('inov').disabled == false) {
                                               document.getElementById('inov').disabled = true
                                           }
                                           if (document.getElementById('manu').disabled == false) {
                                               document.getElementById('manu').disabled = true
                                           }
                                           if (document.getElementById('pequ').disabled == false) {
                                               document.getElementById('pequ').disabled = true
                                           }"/> Financiador Acadêmico<br>
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
                        <input type="submit" name="submit" /> <input type="reset"/>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
    </body>
</html>