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
        <title>Realizar Mudanças</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            $pesquisa = $_POST["valor"];
            if (isset($_FILES['imagem'])) {
                echo ("FODA SE");
                $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
                $novo_nome = md5(time()) . $extensao;
                $diretorio = "imagens/";
                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
                $sql = "UPDATE projeto_candidato SET nome_projeto = '" . $_POST['nome_proj'] . "', categoria_projeto = '" . $_POST['categoria'] . "', duracao_projeto = '" . $_POST['duracao'] . "', valor_projeto = '" . $_POST['valor'] . "', descricao_projeto = '" . $_POST['descricao'] . "', imagem_projeto = '" . $novo_nome . "', video_projeto = '" . $_POST['video'] . "' WHERE nome_projeto = '" . $pesquisa . "'";
            } else {
                echo ("Foda se");
                $sql = "UPDATE projeto_candidato SET nome_projeto = '" . $_POST['nome_proj'] . "', categoria_projeto = '" . $_POST['categoria'] . "', duracao_projeto = '" . $_POST['duracao'] . "', valor_projeto = '" . $_POST['valor'] . "', descricao_projeto = '" . $_POST['descricao'] . "', imagem_projeto = '" . $_POST['link'] . "', video_projeto = '" . $_POST['video'] . "' WHERE nome_projeto = '" . $pesquisa . "'";
            }
            mysqli_query($con, $sql); /* executa a query */
            mysqli_close($con);
            ?>
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Os dados foram alterados com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <a class="btn btn-primary" href="alterar_projcandidato.php">Alterar outro</a>
                                </div>
                                <div class="col-md-10">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php
    } else {
        $pesquisa = $_GET["nome"];
        $sql = "SELECT * FROM projeto_candidato WHERE nome_projeto = '" . $pesquisa . "'";
        $result = mysqli_query($con, $sql); /* executa a query */
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $cat = $row['categoria_projeto'];
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Entre com os dados a serem alterados</h3>
                        <form id="cadastra_projecandidato" action="mudancas_projcandidato.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Nome do Projeto</label>
                                <div class="col-sm-6">
                                    <input type="text" id="pass" class = "form-control" name="nome_proj" value="<?php echo $row['nome_projeto'] ?>"required/> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Categoria</label>
                                <div class="col-sm-6" >
                                    <input type="radio" id="pesq" value="Pesquisa" name="categoria" required <?php if ($cat == 'Pesquisa') { ?> checked <?php } ?>/> Pesquisa<br>
                                    <input type="radio" id="comp" value="Competição Tecnológica" name="categoria" <?php if ($cat == 'Competição Tecnológica') { ?> checked <?php } ?>/> Competição Tecnológica<br>
                                    <input type="radio" id="inov" value="Inovação no Ensino" name="categoria" <?php if ($cat == 'Inovação no Ensino') { ?> checked <?php } ?>/> Inovação no Ensino<br>
                                    <input type="radio" id="manu" value="Manutenção e Reforma" name="categoria" <?php if ($cat == 'Manutenção e Reforma') { ?> checked <?php } ?>/> Manutenção e Reforma<br>
                                    <input type="radio" id="pequ" value="Pequenas Obras" name="categoria" <?php if ($cat == 'Pequenas Obras') { ?> checked <?php } ?>/> Pequenas Obras<br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Duração</label>
                                <div class="col-sm-6">
                                    <input type="number" class = "form-control" name="duracao" value="<?php echo $row['duracao_projeto'] ?>"required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Valor Previsto</label>
                                <div class="col-sm-6">
                                    <input type="text" step="0.01" class = "form-control" name="valor" value="<?php echo $row['valor_projeto'] ?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Imagem</label>
                                <div class="col-sm-6">
                                    <input type="hidden" name="link" value="<?php echo $row['imagem_projeto'] ?>"/>
                                    <img src="imagens/<?php echo $row['imagem_projeto']; ?>" height="400px" weidth="400px"><br><br>
                                    <input type="file" name="imagem" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Link video</label>
                                <div class="col-sm-6">
                                    <input type="text" class = "form-control" name="video" value="<?php echo $row['video_projeto'] ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">Descrição</label>
                                <div class="col-sm-6">
                                    <textarea rows="4" cols="71" class="form-control" name="descricao"><?php echo $row['descricao_projeto']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <br/>
                                <input type="hidden" value="<?php echo $pesquisa ?>" name="valor">
                                <div class="row">
                                    <div class="col-md-1">
                                        <button type="submit" name="submit" class="btn btn-primary">Alterar</button>
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
        </div>>
        <?php
    }
    include_once 'footer.php';
    ?>
</body>
</html>
