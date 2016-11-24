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
        <title>Consultar Projetos Aprovados</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            if ($_POST['cod'] != "" || $_POST['nome_proj'] != "") {
                $sql = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $_POST['cod'] . " OR nome_projeto = '" . $_POST['nome_proj'] . "' AND status_projeto = 'aprovado'";
            } else {
                $sql = "SELECT * FROM projeto_candidato WHERE status_projeto = 'aprovado'";
            }
            $result = mysqli_query($con, $sql); /* executa a query */
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><b>Listar Projetos Aprovados</b></legend>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Codigo</b></td>
                                        <td><b>Nome</b></td>
                                    </tr>
                                    <?php
                                    //Lista dados
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="visualizar_projaprov.php?codigo=<?php echo $row['cod_projeto']?>"><?php echo $row['cod_projeto']; ?></a>
                                            </td>
                                            <td>
                                                <?php echo $row['nome_projeto']; ?>
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
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Entre com os dados do projeto a pesquisar</h3>
                            <form id="consulta_user"action="consulta_projaprov.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-6">
                                        <input type="number" class = "form-control" name="cod" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Nome do Projeto</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="nome_proj" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
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