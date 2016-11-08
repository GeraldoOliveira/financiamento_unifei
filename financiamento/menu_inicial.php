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
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $vetor[$i] = $row['video_projeto'];
            $i++;
        }
        $vid1 = $vetor[rand(1, count($vetor))];
        $vid2 = $vetor[rand(1, count($vetor))];
        $vid3 = $vetor[rand(1, count($vetor))];
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br><h1>Seja bem-vindo <?php echo $_SESSION["nome"]; ?></h1>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div >
                            <iframe class="embed-responsive-item" src="<?php echo $vid1 ?>"
                                    allowfullscreen=""  height="300px" weidth="350px"  frameborder="0"></iframe>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <iframe  class="embed-responsive-item" src="<?php echo $vid2 ?>"
                                     allowfullscreen=""  height="300px" weidth="350px"  frameborder="0"></iframe>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <iframe  class="embed-responsive-item" src="<?php echo $vid3 ?>"
                                     allowfullscreen=""  height="300px" weidth="350px"  frameborder="0"></iframe>
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