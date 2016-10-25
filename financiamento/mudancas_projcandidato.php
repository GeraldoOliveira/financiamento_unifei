<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Realizar Mudanças</title>
    </head>
    <body> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            $pesquisa = $_POST["valor"];
            $sql = "UPDATE projeto_candidato SET nome_projeto = '" . $_POST['nome_proj'] . "', categoria_projeto = '" . $_POST['categoria'] . "', duracao_projeto = '" . $_POST['duracao'] . "', valor_projeto = '" . $_POST['valor'] . "' WHERE nome_projeto = '" . $pesquisa . "'";
            mysqli_query($con, $sql); /* executa a query */
            mysqli_close($con);
            ?><h3>Os dados foram alterados com sucesso.</h3>
            <h4><a href="alterar_projcandidato.php">Nova alteração</a>
            <?php
            } else {
                    $pesquisa = $_GET['nome'];
                    ?>
        
        <h3>Entre com os dados a serem alterados</h3>
        <form id="cadastra_projecandidato"action="mudancas_projcandidato.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Nome do Projeto</label>
                    <div class="col-sm-6">
                        <input type="text" id="pass" class = "form-control" name="nome_proj" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Categoria</label>
                    <div class="col-sm-6" >
                        <input type="radio" id="pesq" value="Pesquisa" name="categoria" /> Pesquisa<br>
                        <input type="radio" id="comp" value="Competição Tecnológica" name="categoria" /> Competição Tecnológica<br>
                        <input type="radio" id="inov" value="Inovação no Ensino" name="categoria" /> Inovação no Ensino<br>
                        <input type="radio" id="manu" value="Manutenção e Reforma" name="categoria" /> Manutenção e Reforma<br>
                        <input type="radio" id="pequ" value="Pequenas Obras" name="categoria" /> Pequenas Obras<br>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Duração</label>
                    <div class="col-sm-6">
                        <input type="number" class = "form-control" name="duracao" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Valor Previsto</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="valor" />
                    </div>
                </div>
                <div class="form-group">
                    <br/>
                    <label  class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <input type="hidden" value="<?php echo $pesquisa ?>" name="valor">
                        <input type="submit" name="submit" /> <input type="reset" onclick=''/>
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
    </body>
</html>
