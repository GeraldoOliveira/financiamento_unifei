<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Consultar Usuarios</title>
    </head>
    <body> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            if ($_POST["cod"] == "" && $_POST["nome_proj"] == "") {
                $sql = "SELECT * FROM projeto_candidato WHERE categoria_projeto = '" . $_POST["categoria"] . "'";
            }else{
                $sql = "SELECT cod_projeto, nome_projeto , categoria_projeto , duracao_projeto , valor_projeto , status_projeto FROM projeto_candidato WHERE nome_projeto = '" . $_POST["nome_proj"] . "' OR cod_projeto = '" . $_POST["cod"] . "'";
            }
            $result = mysqli_query($con, $sql); /* executa a query */
            ?>
            <fieldset>
                <legend><b>Lista Informações de Projetos</b></legend>
                <table class="table table-bordered">
                    <tr>
                        <td><b>Codigo</b></td>
                        <td><b>Nome</b></td>
                        <td><b>Categoria</b></td>
                        <td><b>Duração Estimada</b></td>
                        <td><b>Valor Estimado</b></td>
                        <td><b>Status do Projeto</b></td>
                    </tr>
                    <?php
                    //Lista dados
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['cod_projeto']; ?> 
                            </td>
                            <td>
                                <?php echo $row['nome_projeto']; ?>
                            </td>
                            <td>
                                <?php echo $row['categoria_projeto']; ?> 
                            </td>
                            <td>
                                <?php echo $row['duracao_projeto']; ?>
                            </td>
                            <td>
                                <?php echo $row['valor_projeto']; ?> 
                            </td>
                            <td>
                                <?php echo $row['status_projeto']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </fieldset>
            <?php
        } else {
            ?>
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entre com os dados do projeto</h3>
            <form id="consulta_user"action="listar_projcandidato.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Código</label>
                    <div class="col-sm-6">
                        <input type="number" class = "form-control" name="cod" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Nome do Projeto</label>
                    <div class="col-sm-6">
                        <input type="text" class = "form-control" name="nome_proj" /> 
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
                    <br/>
                    <label  class="col-sm-2 control-label"></label>
                    <div class="col-sm-6">
                        <input type="submit" name="submit" /> <input type="reset" />
                    </div>
                </div>
            </form>
            <?php
        }
        ?>
    </body>
</html>