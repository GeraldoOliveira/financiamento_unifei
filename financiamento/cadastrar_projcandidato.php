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

        <title>Cadastrar Projeto Candidato</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {

            if (isset($_FILES['imagem'])) {
                $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
                $novo_nome = md5(time()) . $extensao;
                $diretorio = "imagens/";

                move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $novo_nome);
            }
            ?>

            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $sql = "INSERT INTO projeto_candidato VALUES (' ','" . $_POST["nome_proj"] . "','" .
                                    $_POST["categoria"] . "'," . $_POST["duracao"] . ",'" . $_POST["valor"] .
                                    "','candidato','" . $_POST['descricao'] . "','" . $novo_nome . "','" . $_POST['video'] . "')";
                            mysqli_query($con, $sql); /* executa a query */
                            mysqli_close($con);
                            ?>
                            <h3>O projeto foi cadastrado com sucesso.</h3><br><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <a class="btn btn-primary" href="menu_inicial.php">Voltar</a>
                                </div>
                                <div class="col-md-11">
                                    <a class="btn btn-primary" href="cadastrar_projcandidato.php">Novo cadastro</a>
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
                            <h3>Entre com os dados do projeto</h3>
                            <form id="cadastra_projecandidato" action="cadastrar_projcandidato.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Nome do Projeto</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="pass" class = "form-control" name="nome_proj" required/> 
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
                                    <label class="col-sm-2 control-label">Duração</label>
                                    <div class="col-sm-6">
                                        <input type="number" class = "form-control" name="duracao" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Valor Previsto</label>
                                    <div class="col-sm-6">
                                        <input type="text" step="0.01" class = "form-control" name="valor" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Imagem</label>
                                    <div class="col-sm-6">
                                        <input type="file" name="imagem" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Video</label>
                                    <div class="col-sm-6">
                                        <input type="text" class = "form-control" name="video" placeholder="Adicionar link do tipo Embed, para compartilhamento." />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Descrição</label>
                                    <div class="col-sm-6">
                                        <textarea rows="4" cols="71" class="form-control" name="descricao" placeholder="Escreva a descrição do projeto"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
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