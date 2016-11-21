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
        <title>Listar Recompensas</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            if ($_POST['nome'] == "" && $_POST['codigo'] != "") {
                $sql = "SELECT * FROM recompensa WHERE cod_projeto = " . $_POST['codigo'] . "";
                $result = mysqli_query($con, $sql); /* executa a query */
            } else if ($_POST['nome'] != "" && $_POST['codigo'] == "") {
                $sql = "SELECT * FROM recompensa WHERE nome_projeto = '" . $_POST['nome'] . "'";
                $result = mysqli_query($con, $sql); /* executa a query */
            } else {
                $sql = "SELECT * FROM recompensa";
                $result = mysqli_query($con, $sql); /* executa a query */
            }
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><b>Lista de recompensas</b></legend>
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b>Nome do Projeto</b></td>
                                        <td><b>Codigo do Projeto</b></td>
                                        <td><b>Valor minimo para recompensa</b></td>
                                        <td><b>Valor máximo para recompensa</b></td>
                                        <td><b>Recompensa</b></td>
                                        <td><b>Deletar</b></td>
                                    </tr>
                                    <?php
                                    //Lista dados
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $sql2 = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $row['cod_projeto'] . "";
                                        $result2 = mysqli_query($con, $sql2);
                                        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                                        ?>
                                        <tr>
                                            <td>
                                                <?php if ($row2['status_projeto'] == 'finalizado') {
                                                    ?> <a href="alterar_recompensa.php?codigo=<?php echo $row['cod_recompensa']; ?>"><?php echo $row['nome_projeto']; ?></a><?php
                                                } else {
                                                    echo $row['nome_projeto'];
                                                }
                                                ?> 
                                            </td>
                                            <td>
                                                <?php echo $row['cod_projeto']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['valor_min']; ?> 
                                            </td>
                                            <td>
                                                <?php echo $row['valor_max']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['descricao']; ?> 
                                            </td>
                                            <?php if ($row2['status_projeto'] == 'finalizado') { ?>
                                            <td>
                                                <div class="col-md-11">
                                                    <a class="btn btn-primary" href="apagar_recompensa.php?codigo=<?php echo $row['cod_recompensa']; ?>">Excluir</a>
                                                </div>
                                            </td>
                                            <?php } ?>
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
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Entre com os dados do projeto</h3>
                            <form id="consulta_user"action="listar_recompensas.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Nome do projeto</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="pass" class = "form-control" name="nome"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Codigo do projeto</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="pass" class = "form-control" name="codigo"/> 
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