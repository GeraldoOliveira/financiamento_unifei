// Se alterar o layout ou estilo Header, deve-se alterar também no formlogin.php

<?php if (!isset($_SESSION["nome"])) { ?>
    <li>
        <a href="#">Cadastrar</a> <!-- cadastro de usuario publico -->
    </li>
<?php } ?>

<html>

    <head>
        <title>UniFunda</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">
        <link href="../config/estilos.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="col-sm-2"></div>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>UniFunda</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#"><?php echo $_SESSION["nome"] ?></a> <!-- editar dados do usuario -->
                        </li>
                        <li>
                            <a href="#">Sair</a> <!-- finalizar sessao -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>