
<h3>O projeto não foi excluído.</h3>
<h4><a href="excluir_projeto.php.php">Excluir projeto</a></h4>
<br>
<h4><a href="menu_inicial.php">Voltar</a></h4><!DOCTYPE html>
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
        <title>Desativação Negada</title>
    </head>
    <body> 
        <?php
        session_start();
        include_once 'header.php';
        include_once 'menu.php';
        include "../financiamento/conexao.php";
        $cod = $_GET["nome"];
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3>O projeto não foi excluído.</h3>
                        <h4><a href="excluir_projeto.php.php">Excluir projeto</a></h4>
                        <br>
                        <h4><a href="menu_inicial.php">Voltar</a></h4>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once 'footer.php';
        ?>
