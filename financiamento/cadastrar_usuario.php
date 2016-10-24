<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Cadastrar Usuarios</title>
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
                    $_POST["categoria"] . "' )";
            mysqli_query($con, $sql); /* executa a query */
            mysqli_close($con);
            echo"<h3>Obrigado. Seus dados foram inseridos</h3> \n";
            echo'<p><a href="cadastrar_usuario.php">Inserir outro usuário.</a></p>' . "\n";
            echo'<p><a href="data_out.php">Veja a lista de alunos</a></p>' . "\n";
        } else {
            ?>
            <h3>Entre com seus dados</h3>
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
                        <input type="password" class = "form-control" name="senha" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Confirma Senha</label>
                    <div class="col-sm-6">
                        <input type="password" class = "form-control" name="c_senha" />
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
                                    if(document.getElementById('pesq').disabled == false){document.getElementById('pesq').disabled = true}
                                    if(document.getElementById('comp').disabled == false){document.getElementById('comp').disabled = true}
                                    if(document.getElementById('inov').disabled == false){document.getElementById('inov').disabled = true}
                                    if(document.getElementById('manu').disabled == false){document.getElementById('manu').disabled = true}
                                    if(document.getElementById('pequ').disabled == false){document.getElementById('pequ').disabled = true}"/> Gestor de Projetos<br>
                        <input type="radio" id="avalid" value="Avaliador de Projetos" name="tipo" onclick="
                                    if(document.getElementById('pesq').disabled == true){document.getElementById('pesq').disabled = false}
                                    if(document.getElementById('comp').disabled == true){document.getElementById('comp').disabled = false}
                                    if(document.getElementById('inov').disabled == true){document.getElementById('inov').disabled = false}
                                    if(document.getElementById('manu').disabled == true){document.getElementById('manu').disabled = false}
                                    if(document.getElementById('pequ').disabled == true){document.getElementById('pequ').disabled = false}"/> Avaliador de Projetos<br>
                        <input type="radio" id="financ" value="Financiador Acadêmico" name="tipo" 
                               onclick="
                                    if(document.getElementById('pesq').disabled == false){document.getElementById('pesq').disabled = true}
                                    if(document.getElementById('comp').disabled == false){document.getElementById('comp').disabled = true}
                                    if(document.getElementById('inov').disabled == false){document.getElementById('inov').disabled = true}
                                    if(document.getElementById('manu').disabled == false){document.getElementById('manu').disabled = true}
                                    if(document.getElementById('pequ').disabled == false){document.getElementById('pequ').disabled = true}"/> Financiador Acadêmico<br>
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
                <script>

                    if (document.getElementById("pesq").value == "Pesquisa") && (document.getElementById("pesq").checked == "false")) {
                        alert("ASIJDIDASJIDJAISJD");
                    }
                </script>
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