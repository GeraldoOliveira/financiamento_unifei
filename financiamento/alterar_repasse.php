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

        <title>Alterar Critério de Avaliação</title>
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
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql = "UPDATE criterio_avaliacao SET criterio = '" . $_POST['criterio_avalia'] . "' , peso = " . $_POST['valor_criterio'] . ", status = " . $_POST['status'] . " WHERE codigo = " . $_POST['codigo'] . "";
                            echo ($sql);
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>O critério foi alterado com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="cadastrar_projcandidato.php">Novo cadastro</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            $codigo = $_GET["cod"];
            $sql = "SELECT * FROM criterio_avaliacao WHERE codigo = '" . $codigo . "'";
            $result = mysqli_query($con, $sql); /* executa a query */
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Realize as alterações necessárias</h3>
                            <form id="cadastra_projecandidato"action="alterar_criterioavalia.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Critério de Avaliação</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="pass" class = "form-control" name="criterio_avalia" value="<?php echo $row['criterio'] ?>"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Peso do Critério</label>
                                    <div class="col-sm-6">
                                        <input type="number" min="0" max="10" required="required"class = "form-control" name="valor_criterio" value="<?php echo $row['peso'] ?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Categoria</label>
                                    <div class="col-sm-6">
                                        <input type="radio" id="ativado" value= "1" name="status" <?php if($row['status'] == 1){ ?>checked<?php } ?> /> Ativado<br>
                                        <input type="radio" id="desativado" value="2" name="status" <?php if($row['status'] == 0){ ?>checked<?php } ?> /> Desativado<br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="hidden" value="<?php echo $codigo; ?>" name="codigo">
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