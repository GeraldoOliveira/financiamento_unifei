<!DOCTYPE html>
<html>
    <head>
        <title>Financiamento UNIFEI</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
              rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
        session_start();
        include_once 'conexao.php';
        include_once 'header.php';
        include_once 'menu.php';
        $sql = "SELECT * FROM projeto_candidato";
        $result = mysqli_query($con, $sql); /* executa a query */
        $i = 1;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $vetor[$i] = $row['video_projeto'];
            $vetor2[$i] = $row['nome_projeto'];
            $vetor3[$i] = $row['valor_projeto'];
            $vetor4[$i] = $row['financiado_projeto'];
            $i++;
        }
        $var1 = rand(1, count($vetor));
        $var2 = rand(1, count($vetor));
        $var3 = rand(1, count($vetor));
        while ($var1 == $var2 || $var1 == $var3 || $var2 == $var3) {
            if ($var1 == $var2) {
                $var1 = rand(1, count($vetor));
            } else if ($var1 == $var3) {
                $var1 = rand(1, count($vetor));
            } else {
                $var2 = rand(1, count($vetor));
            }
        }
        $porcento1 = (($vetor4[$var1] / $vetor3[$var1]) * 100);
        $porcento2 = (($vetor4[$var2] / $vetor3[$var2]) * 100);
        $porcento3 = (($vetor4[$var3] / $vetor3[$var3]) * 100);
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br><h1>Seja bem-vindo <?php echo $_SESSION["nome"]; ?></h1>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <h3>Veja alguns projetos.</h3>
                        <div class="col-md-4">
                            <h4> <a href="financiar_projeto.php"><?php echo $vetor2[$var1]; ?></a> </h4>
                            <iframe class="embed-responsive-item" src="<?php echo $vetor[$var1]; ?>"
                                    allowfullscreen=""  height= "300px" width="100%"  frameborder="0" class="img-responsive">
                            </iframe>
                            <h5> Andamento do Projeto </h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:<?php echo $porcento1; ?>%"></div>
                            </div>
                            <h5><?php echo $vetor4[$var1]; ?> / <?php echo $vetor3[$var1]; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h4> <a href="financiar_projeto.php"><?php echo $vetor2[$var2]; ?></a> </h4>
                            <iframe  class="embed-responsive-item" src="<?php echo $vetor[$var2]; ?>"
                                     allowfullscreen=""  height="300px" width="350px"  frameborder="0">
                            </iframe>
                            <h5> Andamento do Projeto </h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:<?php echo $porcento2; ?>%"></div>
                            </div>
                            <h5><?php echo $vetor4[$var2]; ?> / <?php echo $vetor3[$var2]; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h4> <a href="financiar_projeto.php"><?php echo $vetor2[$var3]; ?></a> </h4>
                            <iframe  class="embed-responsive-item" src="<?php echo $vetor[$var3]; ?>"
                                     allowfullscreen=""  height="300px" width="350px"  frameborder="0">
                            </iframe>
                            <h5> Andamento do Projeto </h5>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width:<?php echo $porcento3; ?>%"></div>
                            </div>
                            <h5><?php echo $vetor4[$var3]; ?> / <?php echo $vetor3[$var3]; ?></h5>
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