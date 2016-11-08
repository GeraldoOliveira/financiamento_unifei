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
        <title>Consultar Repasses dos Projetos</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {


            $cod_proj = $_POST['cod_proj'];
            if ($_POST['datarepasse'] == "dd-mm-aaaa") {
                $sql = "SELECT * FROM repasse WHERE cod_projeto = " . $cod_proj;
            } else {
                $data = date_create($_POST['datarepasse']);
                $c_data = date_format($data, 'Y/m/d');
                $sql = "SELECT * FROM repasse WHERE cod_projeto = " . $cod_proj . " AND data = '" . $c_data . "'";
            }
            $result = mysqli_query($con, $sql); /* executa a query */

            $sql2 = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $cod_proj;
            $result2 = mysqli_query($con, $sql2); /* executa a query */
            $row = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            $nome_proj = $row['nome_projeto'];


            $result3 = mysqli_query($con, $sql); /* executa a query */
            ?>;
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend><b>Lista de Repasses do Projeto</b></legend>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Nome do Projeto</th>
                                        <th>Valor do Repasse</th>
                                        <th>Necessidade</th>
                                        <th>Valor da Necessiade</th>
                                        <th>Data</th>
                                    </tr>
                                    <?php
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><a href="alterar_repasse.php?codigo='<?php echo $row['cod_repasse']; ?>'"><?php echo $nome_proj; ?></a></td>
                                            <td>
                                                <?php
                                                $soma = 0;
                                                mysqli_data_seek($result3, 0);
                                                while ($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                                                    if ($row2['necessidade'] == $row['necessidade'])
                                                        $soma += $row2['valor'];
                                                }
                                                echo number_format($soma, 2, ',', '.');
                                                ?>
                                            </td>
                                            <td><?php echo $row['necessidade']; ?></td>
                                            <td><?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                                            <td>
                                                <?php
                                                $data = date_create($row['data']);
                                                echo date_format($data, "d/m/Y");
                                                ?>
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
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Entre com os dados do projeto a pesquisar</h3>
                            <form id="consulta_user"action="listar_repasse.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Código do Projeto</label>
                                    <div class="col-sm-6">
                                        <input type="number" id="pass" class = "form-control" name="cod_proj" required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data</label>
                                    <div class="col-sm-6">
                                        <input type="date" value="dd-mm-aaaa" class ="form-control" name="datarepasse"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button type="submit" name="submit" class="btn btn-primary">Pesquisar</button>
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