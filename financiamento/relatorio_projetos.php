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
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>

        <title>Relatório de Projetos por Categoria</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {

            $sql2 = "SELECT DISTINCT categoria_projeto FROM projeto_candidato WHERE status_projeto = 'finalizado' OR status_projeto = 'aprovado' ";
            $result2 = mysqli_query($con, $sql2); /* executa a query */

            $sql3 = "SELECT * FROM projeto_candidato WHERE status_projeto = 'finalizado' OR status_projeto = 'aprovado'";
            $result3 = mysqli_query($con, $sql3); /* executa a query */
            ?>;

            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend><b>Relatório de Projetos por Categoria</b></legend>
                                <?php while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) { ?>
                                    <table class = "table table-bordered">
                                        <tr>
                                            <th style = "text-align: center; font-size: 1.25em;" colspan = "2"><?php echo $row2['categoria_projeto'];
                                    ?></th>
                                        </tr>
                                        <tr>
                                            <th style = "width: 60%;">Projeto</th>
                                            <th>Valor investido (R$)</th>
                                        </tr>
                                        <?php
                                        $somatotal = 0;
                                        mysqli_data_seek($result3, 0);
                                        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                                            if ($row2['categoria_projeto'] == $row3['categoria_projeto']) {

                                                if ($_POST['datafinal'] == "dd-mm-aaaa" && $_POST['datainicial'] == "dd-mm-aaaa") {
                                                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'];
                                                } else if ($_POST['datafinal'] == "dd-mm-aaaa") {
                                                    $datainicial = date_create($_POST['datainicial']);
                                                    $c_data = date_format($datainicial, 'Y/m/d');
                                                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'] . " AND data >= '" . $c_data . "'";
                                                } else if ($_POST['datainicial'] == "dd-mm-aaaa") {
                                                    $datafinal = date_create($_POST['datafinal']);
                                                    $c_data = date_format($datafinal, 'Y/m/d');
                                                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'] . " AND data <= '" . $c_data . "'";
                                                } else {
                                                    $datafinal = date_create($_POST['datafinal']);
                                                    $datainicial = date_create($_POST['datainicial']);
                                                    $c_data = date_format($datafinal, 'Y/m/d');
                                                    $d_data = date_format($datainicial, 'Y/m/d');
                                                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'] . " AND data <= '" . $c_data . "' AND data >= '" . $d_data . "'";
                                                }

                                                $result1 = mysqli_query($con, $sql1); /* executa a query */
                                                $soma = 0;
                                                while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                                                    $soma += $row1['valor'];
                                                    $somatotal += $row1['valor'];
                                                }
                                                ?>
                                                <tr>
                                            <td><a href="relatorio_investimento.php?p=<?php echo $row3['cod_projeto'];?>&d=<?php echo $_POST['datafinal'];?>"> <?php echo $row3['nome_projeto']; ?></a></td>
                                                    <td>
                                                        <?php
                                                        echo number_format($soma, 2, ',', '.');
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <th>Total</th>
                                            <th><?php echo number_format($somatotal, 2, ',', '.'); ?></th>
                                        </tr>
                                    </table>
                                <?php } ?>
                            </fieldset>
                            <p></p>
                            <p></p>
                        </div>
                        <div id="container" style="margin: 0 auto;" class="col-md-6">
                            <script type="text/javascript">
                                $(function () {
    // Create the chart
                                    Highcharts.chart('container', {
                                        chart: {
                                            type: 'column'
                                        },
                                        title: {
                                            text: 'Investimentos'
                                        },
                                        subtitle: {
                                            text: 'Investimento por categoria de projeto'
                                        },
                                        xAxis: {
                                            type: 'category'
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Valor (R$)'
                                            }

                                        },
                                        legend: {
                                            enabled: false
                                        },
                                        plotOptions: {
                                            series: {
                                                borderWidth: 0,
                                                dataLabels: {
                                                    enabled: true,
                                                    format: 'R$ {point.y:.2f}'
                                                }
                                            }
                                        },
                                        tooltip: {
                                            headerFormat: '<span style="font-size:12px">{series.name}:</span><br>',
                                            pointFormat: 'Foi investido <b>R$ {point.y:.2f}</b> nos projetos de <span style="color:{point.color}">{point.name}</span>'
                                        },
                                        series: [{
                                                name: 'Investimento',
                                                colorByPoint: true,
                                                colorBySeries: true,
                                                data: [
    <?php
    mysqli_data_seek($result2, 0);
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $somatotal = 0;
        mysqli_data_seek($result3, 0);
        while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
            if ($row2['categoria_projeto'] == $row3['categoria_projeto']) {

                if ($_POST['datafinal'] == "dd-mm-aaaa" && $_POST['datainicial'] == "dd-mm-aaaa") {
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'];
                } else if ($_POST['datafinal'] == "dd-mm-aaaa") {
                    $datainicial = date_create($_POST['datainicial']);
                    $c_data = date_format($datainicial, 'Y/m/d');
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'] . " AND data >= '" . $c_data . "'";
                } else if ($_POST['datainicial'] == "dd-mm-aaaa") {
                    $datafinal = date_create($_POST['datafinal']);
                    $c_data = date_format($datafinal, 'Y/m/d');
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'] . " AND data <= '" . $c_data . "'";
                } else {
                    $datafinal = date_create($_POST['datafinal']);
                    $datainicial = date_create($_POST['datainicial']);
                    $c_data = date_format($datafinal, 'Y/m/d');
                    $d_data = date_format($datainicial, 'Y/m/d');
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $row3['cod_projeto'] . " AND data <= '" . $c_data . "' AND data >= '" . $d_data . "'";
                }

                $result1 = mysqli_query($con, $sql1); /* executa a query */
                $soma = 0;
                while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                    $soma += $row1['valor'];
                    $somatotal += $row1['valor'];
                }
            }
        }
        ?>
                                                        {
                                                            name: '<?php echo $row2['categoria_projeto']; ?>',
                                                            y: <?php echo $somatotal; ?>
                                                        },
        <?php
    }
    ?>
                                                ]
                                            }]
                                    });
                                });
                            </script>

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
                            <h3>Entre com os dados para gerar o relatório</h3>
                            <form id="consulta_user"action="relatorio_projetos.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data inicial</label>
                                    <div class="col-sm-6">
                                        <input type="date" value="dd-mm-aaaa" name="datainicial" class ="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data final</label>
                                    <div class="col-sm-6">
                                        <input type="date" value="dd-mm-aaaa" name="datafinal" class ="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <button type="submit" name="submit" class="btn btn-primary">Gerar Relatório</button>
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