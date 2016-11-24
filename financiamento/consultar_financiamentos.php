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
        <title>Consultar Financiamentos</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            $dat = date_create($_POST['data']);
            $data = date_format($dat, "Y-m-d");
            if ($_POST['nome_proj'] == "" && $_POST['data'] != "") {
                $sql = "SELECT * FROM financiamento WHERE data = '" . $data . "', financiador = '" . $_SESSION['nome'] . "' ORDER BY nome";
                $result = mysqli_query($con, $sql);
            } else if ($_POST['nome_proj'] != "" && $_POST['data'] == "") {
                $sql = "SELECT * FROM financiamento WHERE nome = '" . $_POST['nome_proj'] . "', financiador = '" . $_SESSION['nome'] . "' ORDER BY nome, data";
                $result = mysqli_query($con, $sql);
            } else {
                $sql = "SELECT * FROM financiamento WHERE financiador = '" . $_SESSION['nome'] . "' ORDER BY nome";
                $result = mysqli_query($con, $sql);
            }
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><b>Listar Financiamentos</b></legend>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Nome</b></td>
                                        <td><b>Data</b></td>
                                        <td><b>Valor</b></td>
                                    </tr>
                                    <?php
                                    //Lista dados
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="visualizar_projaprov.php?codigo=<?php echo $row['cod_projeto'] ?>"><?php echo $row['nome']; ?></a>
                                            </td>
                                            <td>
                                                <?php $data = date_create($row['data']);
                                                echo date_format($data, "d/m/Y");
                                                ?>
                                            </td>
                                            <td>
                                                R$ <?php echo $row['valor']; ?>,00
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
                            <h3>Entre com o nome ou data do financiamento</h3>
                            <form id="consulta_user"action="consultar_financiamentos.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Nome do Projeto</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="nome_proj" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data do Financiamento</label>
                                    <div class="col-sm-6">
                                        <input type="date" placeholder="dd-mm-YYYY" class = "form-control" name="data" /> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button type="submit" name="submit" class="btn btn-primary">Pesquisar</button>
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
