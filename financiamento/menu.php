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
    </head>
    <body>
        <?php 
            if(!isset($_SESSION["nome"])) {
                header("Location:index.php");
            }
        ?>
        <div class="section section-info text-left">
            <div class="container">
                <div class="row text-left">
                    <?php 
                    #$tipo = $_SESSION['tipo'];
                    #if($tipo === "Gestor de Projetos") {?>
                    <div class="col-md-2">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Usuarios    <span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="cadastrar_usuario.php">Adicionar</a>
                                </li>
                                <li>
                                    <a href="consultar_usuario.php">Listar</a>
                                </li>
                                <li>
                                    <a href="alterar_usuario.php">Alterar</a>
                                </li>
                                <li>
                                    <a href="usuario_desativado.php">Desativar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php #} else if($tipo == "Avaliador de Projetos") { ?>
                    <div class="col-md-2">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Projetos    <span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="cadastrar_projcandidato.php">Adicionar</a>
                                </li>
                                <li>
                                    <a href="listar_projcandidato.php">Listar</a>
                                </li>
                                <li>
                                    <a href="alterar_projcandidato.php">Alterar</a>
                                </li>
                                <li>
                                    <a href="excluir_projeto.php">Excluir</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="avaliar_projcandidato.php">Avaliar Projeto</a>
                                </li>
                                <li>
                                    <a href="consultar_avaliacoes.php">Consultar Avaliação</a>
                                </li>
                                <li>
                                    <a href="consultar_avaliacoes.php">Alterar Avaliação</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="consulta_projaprov.php">Consultar Projetos Aprovados</a>
                                </li>
                                <li>
                            </ul>
                        </div>
                    </div>
                    <?php #} ?>
                    <div class="col-md-3">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Critérios de Avaliação    <span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="cadastrar_criterioavalia.php">Adicionar</a>
                                </li>
                                <li>
                                    <a href="listar_criterioavalia.php">Listar</a>
                                </li>
                                <li>
                                    <a href="listar_criterioavalia.php">Alterar</a>
                                </li>
                                <li>
                                    <a href="listar_criterioavalia.php">Desativar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="btn-group btn-group-lg">
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Repasses de Projetos    <span class="fa fa-caret-down"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                <li>
                                    <a href="cadastrar_repasse.php">Adicionar</a>
                                </li>
                                <li>
                                    <a href="listar_repasse.php">Listar</a>
                                </li>
                                <li>
                                    <a href="listar_repasse.php">Alterar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>