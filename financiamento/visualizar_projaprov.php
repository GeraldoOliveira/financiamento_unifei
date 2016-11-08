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
        <title>Visualizar Projeto Aprovado</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        
        $cod = $_GET['codigo'];
        
        $sql = "SELECT * FROM projeto_candidato WHERE cod_projeto = " . $cod . "";
        
        $result = mysqli_query($con, $sql); /* executa a query */
        
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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
                                        <td>
                                            <?php echo $row['descricao_projeto']; ?>
                                        </td>
                                        <td>
                                            <img src="imagens/<?php echo $row['imagem_projeto']; ?>" height="200px" width="200px">
                                        </td>
                                        <td>
                                            <?php echo $row['video_projeto']; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-2">
                                <a class="btn btn-primary" href="finalizar_projeto.php?codigo=<?php echo $cod; ?>">Finalizar projeto</a>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once 'footer.php';
        ?>
    </body>
</html>