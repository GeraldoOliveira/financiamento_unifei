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
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $_POST['codigo'] . ""; /*seleciona todo o banco de projetos */
                            $result = mysqli_query($con, $sql); /* executa a query */
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $valorSomado = $row['financiado_projeto'] + $_POST['valor'];
                            $data = date("Y,m,d");
                            $sql = $sql = "INSERT INTO financiamento VALUES (" . $_POST["codigo"] . ",'" . $_SESSION['nome'] . "','" .
                                    $data . "'," . $_POST['valor'] . ", ' ') "; /*salva os valores na tabela financiamento*/
                            mysqli_query($con, $sql); /* executa a query */
                            $sql = "UPDATE projeto_candidato SET financiado_projeto = " . $valorSomado . " WHERE cod_projeto = " . $_POST['codigo'] . ""; /*atualiza o valor total financiado */
                            mysqli_query($con, $sql);
                            mysqli_close($con);
                            ?>
                            <h3>O financiamento foi realizado com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="consulta_projaprov.php">Novo Financiamento</a>
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
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Escolha valor e forma de pagamento</h3><br>
                            <form id="defini_restrições"action="financiar_projeto.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valor a financiar</label>
                                    <div class="col-sm-6">
                                        <input type="number" min="<?php echo $row['valor_min']?>" max="<?php echo $row['valor_max']?>"class = "form-control" value= 0 name="valor" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Forma de pagamento</label>
                                    <div class="col-sm-6" >
                                        <input type="radio" id="boleto" value="Pesquisa" name="pagamento" required/> Boleto Bancário<br>
                                        <input type="radio" id="credito" value="Competição Tecnológica" name="pagamento" /> Cartão de Crédito<br>
                                        <input type="radio" id="debito" value="Inovação no Ensino" name="pagamento" /> Cartão de Débito<br>
                                        <input type="radio" id="transferencia" value="Pequenas Obras" name="pagamento" /> Transferência Bancária<br>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="hidden" value="<?php echo $codigo; ?>" name="codigo"/>
                                            <button type="submit" name="submit" class="btn btn-primary">Financiar projeto</button>
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