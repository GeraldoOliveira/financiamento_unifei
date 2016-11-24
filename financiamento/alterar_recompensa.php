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

        <title>Alterar recompensa</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql = "UPDATE recompensa SET descricao = '" . $_POST['descricao'] . "' , valor_min = " . $_POST['valormin'] . ", valor_max = " . $_POST['valormax'] . ", quantidade = " . $_POST['quantidade'] . " WHERE cod_recompensa = " . $_POST['cod'] . "";
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>A recompensa foi alterada com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="listar_recompensas.php">Novo cadastro</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            $codigo = $_GET['codigo'];
            $sql = "SELECT * FROM recompensa WHERE cod_projeto = " . $codigo . "";
            $result = mysqli_query($con, $sql); /* executa a query */
            $row = mysqli_fetch_array($result);
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Realize mudanças, se desejar</h3>
                            <form id="cadastra_projecandidato" action="alterar_recompensa.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Descrição da recompensa</label>
                                    <div class="col-sm-6">
                                        <textarea rows="4" cols="71" class="form-control" name="descricao" ><?php echo $row['descricao'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valor mínimo para recompensa</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="0.01" class = "form-control" value="<?php echo $row['valor_min'];?>" name="valormin" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valor máximo para recompensa</label>
                                    <div class="col-sm-6">
                                        <input type="number" step="0.01" class = "form-control" name="valormax" value="<?php echo $row['valor_max'];?>"required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Quantidade de recompensas</label>
                                    <div class="col-sm-6">
                                        <input type="number"  class="form-control" name="quantidade" <?php echo $row['quantidade'];?>required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="hidden" name="cod" value="<?php echo $codigo ?>">
                                            <button type="submit" name="submit" class="btn btn-primary">Alterar</button>
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