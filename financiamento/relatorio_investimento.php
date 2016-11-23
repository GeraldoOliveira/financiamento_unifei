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

        <title>Relatório de Investimentos Financeiros</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"]) || isset($_GET["p"])) {
            if (isset($_POST["submit"])) {
                $cod_proj = $_POST['cod_proj'];
                if ($_POST['datafinal'] == "dd-mm-aaaa") {
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $cod_proj . " ORDER BY data, valor";
                } else {
                    $data = date_create($_POST['datafinal']);
                    $c_data = date_format($data, 'Y/m/d');
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $cod_proj . " AND data <= '" . $c_data . "' ORDER BY data, valor";
                }
            } else if(isset($_GET["p"])){
                $cod_proj = $_GET['p'];
                if ($_GET['d'] == "dd-mm-aaaa") {
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $cod_proj . " ORDER BY data, valor";
                } else {
                    $data = date_create($_GET['d']);
                    $c_data = date_format($data, 'Y/m/d');
                    $sql1 = "SELECT * FROM financiamento WHERE cod_projeto = " . $cod_proj . " AND data <= '" . $c_data . "' ORDER BY data, valor";
                }
            }

            $result1 = mysqli_query($con, $sql1); /* executa a query */

            $sql3 = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $cod_proj . "";
            $result3 = mysqli_query($con, $sql3); /* executa a query */
            $row = mysqli_fetch_array($result3, MYSQLI_ASSOC);
            $projeto = $row['nome_projeto'];
            ?>;

            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend><b>Relatório de Investimentos Financeiros</b></legend>
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="text-align: center; font-size: 1.25em;" colspan="2">Projeto <?php echo $projeto; ?></th>
                                    </tr>
                                    <tr>
                                        <th>Investidor</th>
                                        <th>Valor (R$)</th>
                                    </tr>
                                    <?php
                                    $soma = 0;
                                    while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['financiador']; ?></td>
                                            <td>
                                                <?php
                                                $soma += $row['valor'];
                                                echo number_format($row['valor'], 2, ',', '.');
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Total</th>
                                        <th><?php echo number_format($soma, 2, ',', '.'); ?></th>
                                    </tr>
                                </table>
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
                                            text: '<?php echo $projeto; ?>'
                                        },
                                        subtitle: {
                                            text: 'Investimento no projeto'
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
                                            pointFormat: '<span style="color:{point.color}">{point.name}</span> investiu R$ {point.y:.2f} em <b>{point.date}</b><br/>'
                                        },
                                        series: [{
                                                name: 'Investimento',
                                                colorByPoint: true,
                                                colorBySeries: true,
                                                data: [<?php
                                mysqli_data_seek($result1, 0);
                                while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
                                    $data = date_create($row['data']);
                                    ?>
                                                        {
                                                            name: '<?php echo $row['financiador']; ?>',
                                                            y: <?php echo $row['valor']; ?>,
                                                            date: '<?php echo date_format($data, "d/m/Y"); ?>'
                                                        },<?php } ?>]
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
                            <form id="consulta_user"action="relatorio_investimento.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Código do Projeto</label>
                                    <div class="col-sm-6">
                                        <input type="number" id="pass" class = "form-control" name="cod_proj" required/> 
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