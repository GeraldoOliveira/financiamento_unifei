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
        <title>Avaliar Projetos Candidatos</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            $sql = "SELECT * FROM avaliacao WHERE cod_projeto = " . $_POST['cod'] . "";
            $result = mysqli_query($con, $sql); /* executa a query */
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Notas da avaliação</h3><br><br>
                            <form id="consulta_user"action="avaliacao_proj.php" method="post" class="form-horizontal">
                                <?php
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $sql2 = "SELECT * FROM criterio_avaliacao WHERE codigo = '" . $row['cod_criterio'] . "'";
                                    $result2 = mysqli_query($con, $sql2);
                                    $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                    ?>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"><?php echo $row2['criterio']; ?></label>
                                        <div class="col-sm-6">
                                            <input type="number" id="login" min=0 max="10" class = "form-control" value ="<?php echo $row['nota']; ?>" name="login_avalia" <?php  if ($_SESSION['tipo'] === 'Avaliador de Projetos'){ ?><?php } else { ?> disabled <?php } ?>/> 
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class = "form-group">
                                        <br/>
                                        <div class = "row">
                                            <div class = "col-md-1">
                                                <input type="hidden" value="<?php echo $cod; ?>" name="cod_proj" />
                                                <button type = "submit" name = "submit" class = "btn btn-primary">Alterar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                <h3>Entre com os dados do projeto a pesquisar</h3>
                                <form id="consulta_user"action="consultar_avaliacoes.php" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Código</label>
                                        <div class="col-sm-6">
                                            <input type="number" class = "form-control" name="cod" required/> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">Nome do Projeto</label>
                                        <div class="col-sm-6">
                                            <input type="text" class = "form-control" name="nome_proj" required /> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label">Categoria</label>
                                        <div class="col-sm-6" >
                                            <input type="hidden" value="vazio" id="vazio" name="categoria" checked>
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
                                            <div class="col-md-1">
                                                <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
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