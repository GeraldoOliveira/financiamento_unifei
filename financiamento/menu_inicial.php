
<!DOCTYPE html>
<html>
    <head>
        <title>Financiamento UNIFEI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <br><h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seja bem-vindo</h4>
        <br>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Usuário
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="cadastrar_usuario.php">Adicionar Usuário</a></li>
                <li><a href="consultar_usuario.php">Listar Usuários</a></li>
                <li><a href="alterar_usuario.php">Alterar Usuários</a></li>
                <li><a href="desativar_usuario.php">Desativar seu usuário</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Projeto Candidato
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="cadastrar_projcandidato.php">Adicionar Projeto Candidato</a></li>
                <li><a href="listar_projcandidato.php">Listar Projetos Candidatos</a></li>
                <li><a href="alterar_projcandidato.php">Alterar Projeto Candidato</a></li>
                <li><a href="excluir_projeto.php">Excluir Projeto Candidato</a></li>
            </ul>
        </div>
    </body>
</html>