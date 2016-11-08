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
        <?php
        include_once 'header.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            ?>
            <div class="section" style="min-height: 600px">
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
                                    <a class="btn btn-primary" href="menu_inicial.php">Logar</a>
                                </div>
                            </div>

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
                                        <input type="text" class = "form-control" name="cpf" required/>
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
                                        <input type="date" value="dd-mm-aaaa"class ="form-control" name="nascimento" required/>
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
                                                       }"required/> Gestor de Projetos<br>
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
                                        <input type="radio" id="pesq" value="Pesquisa" name="categoria" required/> Pesquisa<br>
                                        <input type="radio" id="comp" value="Competição Tecnológica" name="categoria" /> Competição Tecnológica<br>
                                        <input type="radio" id="inov" value="Inovação no Ensino" name="categoria" /> Inovação no Ensino<br>
                                        <input type="radio" id="manu" value="Manutenção e Reforma" name="categoria" /> Manutenção e Reforma<br>
                                        <input type="radio" id="pequ" value="Pequenas Obras" name="categoria" /> Pequenas Obras<br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
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