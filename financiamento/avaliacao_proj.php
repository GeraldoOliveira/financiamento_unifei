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
        <title>Consultar Critérios de Avaliação</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        if (isset($_POST["submit"])) {
            $codigo = $_POST['cod_proj'];
            $data = date('Y-m-d');
            $notatotal = 0;
            $pesototal = 0;
            for ($i = 0; $i < 100; $i++) {
                if ($_POST["cod_avalia" . $i . ""] != NULL) {
                    $codvez = $_POST["cod_avalia" . $i . ""];
                    $notavez = $_POST["nota_avalia" . $i . ""];
                    $pesovez = $_POST["peso_avalia" . $i . ""];
                    $notatotalvez = $notavez * $pesovez;
                    $pesototal += $pesovez;
                    $sql = "INSERT INTO avaliacao VALUES (" . $codigo . ",'" . $_POST["login_avalia"] . "'," .
                                    $codvez . "," . $notavez . ",'" . $data .
                                    "','" . $_POST['sugestao'] . "')";
                    mysqli_query($con, $sql);
                } else {
                    break;
                }
                    $notatotal += $notatotalvez;  
            }
            $media = $notatotal / $pesototal;
            if($media >= 6 ){
                $sql = "UPDATE projeto_candidato SET status_projeto = 'aprovado' WHERE cod_projeto = " . $codigo . "";
                mysqli_query($con, $sql);
            } else {
                $sql = "UPDATE projeto_candidato SET status_projeto = 'reprovado' WHERE cod_projeto = " . $codigo . "";
                mysqli_query($con, $sql);
            }
            ?>

            <?php
        } else {
            $cat = $_GET['categoria'];
            $cod = $_GET['codigo'];
            $sql = "SELECT * FROM criterio_avaliacao  WHERE categoria = '" . $cat . "'";
            $result = mysqli_query($con, $sql);
            ?>
            <div class="section" style="min-height: 600px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Entre com as seguintes informações</h3>
                            <form id="consulta_user"action="avaliacao_proj.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Login do avaliador</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="login" class = "form-control" value ="<?php echo $_SESSION['login']; ?>"name="login_avalia"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Nome do avaliador</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="nome" class = "form-control" value ="<?php echo $_SESSION['nome']; ?>"name="nome_avalia"/> 
                                    </div>
                                </div>
                                <?php
                                $matriz = array(
                                    'cod' => array(),
                                    'pesonota' => array(),
                                );
                                $i = 0;
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    $matriz['cod'][$i] = $row['codigo'];
                                    $matriz['pesonota'][$i] = $row['peso'];
                                    ?>
                                    <div class="form-group">
                                        <label  class="col-sm-2 control-label"><?php echo $row['criterio']; ?></label>
                                        <div class="col-sm-6">
                                            <input type="hidden" value="<?php echo $matriz['pesonota'][$i]; ?>"name="peso_avalia<?php echo $i; ?>" />
                                            <input type="hidden" value="<?php echo $matriz['cod'][$i]; ?>"name="cod_avalia<?php echo $i; ?>" />
                                            <input type="number" min="0" max="10" id="nome" class = "form-control" placeholder="Dê a nota para o critério" name="nota_avalia<?php echo $i; ?>"/>
                                        </div>
                                    </div>
                                    <?php
                                    $i++;
                                }
                                ?>
                                <div class="form-group">
                                    <label  class="col-sm-2 control-label">Sugestões de melhorias</label>
                                    <div class="col-sm-6">
                                        <textarea rows="4" cols="71" class="form-control" name="sugestao" placeholder="Escreva a sugestão aqui"></textarea>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <input type="hidden" value="<?php echo $cod; ?>" name="cod_proj" />
                                            <button type = "submit" name = "submit" class = "btn btn-primary">Avaliar</button>
                                        </div>
                                        <div class = "col-md-10">
                                            <button type = "reset" class = "btn btn-primary">Resetar Campos</button>
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