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

        <title>Definir restrições do projeto</title>
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
                            $dat = date_create($_POST['prazo']);
                            $data = date_format($dat, "Y/m/d");
                            $sql = "UPDATE projeto_candidato SET valor_min = " . $_POST['min'] . " , valor_max = " . $_POST['max'] . " , prazo_max = '" . $data . "' WHERE cod_projeto = " . $_POST['codigo'] . "";
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>As restrições foram definidas com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="consulta_projaprov.php">Nova Alteração</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            $codigo = $_GET["codigo"];
            $sql = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $codigo . "";
            $result = mysqli_query($con, $sql); /* executa a query */
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $data = date_create($row['prazo_max']);
            $data_c = date_format($data, "d/m/Y");
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Defina as restrições, se desejar.</h3><br>
                            <form id="defini_restrições"action="definir_restricoes.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data limite</label>
                                    <div class="col-sm-6">
                                        <input type="date" class = "form-control" value="<?php echo $data_c ?>" name="prazo" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valor mínimo</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="0.01" class = "form-control" value="<?php echo $row['valor_min'];?>" name="min" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valor máximo</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="0.01" class = "form-control" value="<?php echo $row['valor_max'];?>" name="max" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="hidden" value="<?php echo $codigo; ?>" name="codigo"/>
                                            <button type="submit" name="submit" class="btn btn-primary">Definir restrições</button>
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