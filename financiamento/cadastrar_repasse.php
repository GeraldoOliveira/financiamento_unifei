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

        <title>Cadastrar Valor de Repasse Financeiro</title>
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
                            $data = date_create($_POST['datarepasse']);
                            $c_data = date_format($data, "Y/m/d");
                            $cod_proj = $_POST['cod_proj'];
                            $necessidade = $_POST['necessidade'];
                            $valor = $_POST['valor'];
                            $status = $_POST['status'];
                            $sql = "INSERT INTO repasse VALUES (" .  $cod_proj . ",'" . $necessidade . "','" . $c_data . "'," . $valor . "," . $status . ",'')";
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>O repasse foi cadastrado com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="cadastrar_repasse.php">Novo cadastro</a>
                                </div>
                            </div>

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
                            <h3>Entre com os dados do repasse</h3>
                            <form id="cadastra_projecandidato"action="cadastrar_repasse.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Código do Projeto</label>
                                    <div class="col-sm-6">
                                        <input type="number" id="pass" class = "form-control" name="cod_proj" required/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descrição da necessidade</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="necessidade" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Data</label>
                                    <div class="col-sm-6">
                                        <input type="date" value="dd-mm-aaaa" class ="form-control" name="datarepasse" required/>
                                    </div>
                                </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Valor do Repasse</label>
                            <div class="col-sm-6">
                                <input type="number" step="0.01" class = "form-control" name="valor" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Categoria</label>
                            <div class="col-sm-6" >
                                <input type="radio" id="pesq" value=1 name="status" required/> Quitado<br>
                                <input type="radio" id="comp" value=0 name="status" /> Não Quitado<br>
                            </div>
                        </div>
                        <div class="form-group">
                            <br/>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="submit" name="submit" class="btn btn-primary">Confirmar</button>
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