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
        <title>Consultar Usuarios</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
            ?><div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if ($_POST["cod"] == "" && $_POST["nome_proj"] == "") {
                                $sql = "SELECT * FROM projeto_candidato WHERE categoria_projeto = '" . $_POST["categoria"] . "'";
                            } else {
                                $sql = "SELECT * FROM projeto_candidato WHERE nome_projeto = '" . $_POST["nome_proj"] . "' OR cod_projeto = '" . $_POST["cod"] . "'";
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
                                        <td><b>Status</b></td>
                                        <td><b>Descrição</b></td>
                                        <td><b>Imagem</b></td>
                                        <td><b>Video</b></td>
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
                                                <a href="mudancas_projcandidato.php?nome=<?php echo $row['nome_projeto']; ?>"><?php echo $row['nome_projeto']; ?></a>
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
                                            <td>
                                                <?php echo $row['descricao_projeto']; ?>
                                            </td>
                                            <td>
                                                <img src="imagens/<?php echo $row['imagem_projeto']; ?>"height="200px" width="200px">
                                            </td>
                                            <td>
                                                <?php echo $row['video_projeto']; ?>
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
                            <h3>Entre com os dados a pesquisar</h3>
                            <form id="consulta_user"action="alterar_projcandidato.php" method="post" class="form-horizontal">
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
                                        <input type="radio" id="pesq" value="Pesquisa" name="categoria" required/> Pesquisa<br>
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
                                            <button type="submit" name="submit" class="btn btn-primary">Buscar</button>
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