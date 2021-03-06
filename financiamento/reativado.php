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
        <title>Usuário Reativado</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        include "../financiamento/conexao.php";
                        $sql = "UPDATE usuario SET status = 1 WHERE login = '" . $_SESSION['login'] . "'";
                        mysqli_query($con, $sql);
                        ?>
                        <h4>Usuário reativado com sucesso.</h4><br>
                        <div class="row">
                            <div class="col-md-11">
                                <a class="btn btn-primary" href="menu_inicial.php">Iniciar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    include_once 'footer.php';
    ?>
