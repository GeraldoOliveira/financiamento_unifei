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
                    <a class="navbar-brand" href="../index.php"><span>UniFunda</span></a> <!-- index -->
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#">Cadastrar</a> <!-- cadastro de usuario publico -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="post" action="../controller/Logar.php">
                            <div class="form-group" id="login">
                                <label class="control-label" for="exampleInputEmail1">Login</label>
                                <input class="form-control" name="login" id="exempleInputEmail1" placeholder="Entre com o login" type="text">
                            </div>
                            <div class="form-group" id="senha">
                                <label class="control-label" for="exampleInputPassword1">Senha</label>
                                <input class="form-control" name="senha" id="exempleInputPassword" placeholder="Entre com a senha" type="password">
                            </div>
                            <?php
                            if (isset($_GET["erro"])) {
                                $erro = $_GET["erro"];
                                echo "<div class=\"form-group\"><p><font color='red'>$erro</font></p></div>";
                            } ?>
                            <button type="submit" class="btn btn-info btn-lg">Logar
                                <i class="fa fa-check fa-fw"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once("footer.php");
        ?>
