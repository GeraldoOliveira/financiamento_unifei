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
        <title>Listar Critérios de Avaliação</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {

            $sql = "SELECT DISTINCT categoria FROM criterio_avaliacao";
            $sql2 = "SELECT * FROM criterio_avaliacao";
            $result2 = mysqli_query($con, $sql2); /* executa a query */
            $result = mysqli_query($con, $sql); /* executa a query */
            ?>
            <div class="section" style="min-height: 450px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><b>Lista de Critérios de Avaliação</b></legend>
                                <table class="table table-bordered">
                                    <?php
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        if (!isset($_POST['categoria'])) {
                                            $categoria = $row['categoria'];
                                        } else {
                                            $categoria = $_POST['categoria'];
                                        }
                                        if ($row['categoria'] == $categoria) {
                                            ?>
                                            <tr>
                                                <th>
                                                    <?php echo $row['categoria']; ?> 
                                                </th>
                                            </tr>
                                            <?php
                                            mysqli_data_seek($result2, 0);
                                            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                                if ($row['categoria'] == $row2['categoria']) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="alterar_criterioavalia.php?cod=<?php echo $row2['codigo']; ?>"><?php echo $row2['criterio']; ?></a> 
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
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
                            <h3>Entre com os dados do critério a pesquisar</h3>
                            <form id="consulta_user"action="listar_criterioavalia.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Critério de Avaliação</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="pass" class = "form-control" name="criterio_avalia"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Categoria</label>
                                    <div class="col-sm-6">
                                        <input type="radio" id="pesq" value="Pesquisa" name="categoria"/> Pesquisa<br>
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
                                            <button type="submit" name="submit" class="btn btn-primary">Pesquisar</button>
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