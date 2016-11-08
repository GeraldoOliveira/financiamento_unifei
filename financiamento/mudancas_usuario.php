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
        <title>Realizar Mudanças</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            $pesquisa = $_POST["nome"];
            if ($_POST["categoria"] == 'vazio') {
                $cat = NULL;
            } else {
                $cat = $_POST["categoria"];
            }
            $sql = "UPDATE usuario SET login = '" . $_POST['login'] . "', senha = '" . $_POST['senha'] . "', pais = '" . $_POST['pais'] . "', cidade = '" . $_POST['cidade'] . "', estado = '" . $_POST['estado'] . "', endereco = '" . $_POST['endereco'] . "', email = '" . $_POST['email'] . "', categoria = '" . $cat . "' WHERE login = '" . $pesquisa . "'";
            mysqli_query($con, $sql); /* executa a query */
            mysqli_close($con);
            ?>
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Os dados foram alterados com sucesso.</h3>
                            <br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="alterar_usuario.php">Nova Alteração</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            $pesquisa = $_GET["nome"];
            $sql = "SELECT * FROM usuario WHERE login = '" . $pesquisa . "'";
            $result = mysqli_query($con, $sql); /* executa a query */
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Entre com seus dados</h3>
                            <form id="cadastra_user"action="mudancas_usuario.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Login</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="login" value="<?php echo $row['login'] ?>"required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Senha</label>
                                    <div class="col-sm-6">
                                        <input type="password" id="pass" class = "form-control" name="senha" value="<?php echo $row['senha'] ?>"required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">País</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="pais" value="<?php echo $row['pais'] ?>"required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Cidade</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="cidade" value="<?php echo $row['cidade'] ?>"required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="estado" value="<?php echo $row['estado'] ?>" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Endereço</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="endereco" value="<?php echo $row['endereco'] ?>"required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="email" class = "form-control" name="email" value="<?php echo $row['email'] ?>"/>
                                    </div>
                                </div>
                                <?php
                                if ($row['tipo'] == "Avaliador de Projetos") {
                                    ?>
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
                                <?php } else { ?>
                                    <input type="hidden" value="vazio" id="vazio" name="categoria" checked>
                                <?php } ?>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <input type="hidden" value="<?php echo $pesquisa ?>" name="nome">
                                            <button type="submit" name="submit" class="btn btn-primary">Alterar</button>
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