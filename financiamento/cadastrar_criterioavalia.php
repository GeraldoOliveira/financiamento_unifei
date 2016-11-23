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

        <title>Cadastrar Critério de Avaliação</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        ?>

        <?php
        if (isset($_POST["submit"])) {
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql = "INSERT INTO criterio_avaliacao VALUES (' ','" . $_POST["categoria"] . "','" .
                                    $_POST["criterio_avalia"] . "', 1 ,'" . $_POST["valor_criterio"] .
                                    "')";
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>O critério foi cadastrado com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="cadastrar_criterioavalia.php">Novo cadastro</a>
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
                            <h3>Entre com os dados do projeto</h3>
                            <form id="cadastra_projecandidato"action="cadastrar_criterioavalia.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Critério de Avaliação</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="pass" class = "form-control" name="criterio_avalia" required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Categoria</label>
                                    <div class="col-sm-6">
                                        <input type="radio" id="pesq" value="Pesquisa" name="categoria" required/> Pesquisa<br>
                                        <input type="radio" id="comp" value="Competição Tecnológica" name="categoria" /> Competição Tecnológica<br>
                                        <input type="radio" id="inov" value="Inovação no Ensino" name="categoria" /> Inovação no Ensino<br>
                                        <input type="radio" id="manu" value="Manutenção e Reforma" name="categoria" /> Manutenção e Reforma<br>
                                        <input type="radio" id="pequ" value="Pequenas Obras" name="categoria" /> Pequenas Obras<br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Peso do Critério</label>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" max="10" required="required"class = "form-control" name="valor_criterio" />
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