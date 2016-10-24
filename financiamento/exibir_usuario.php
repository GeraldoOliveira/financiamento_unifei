<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="css/style.css" rel="stylesheet">
        <title>Exibir usuario</title>
    </head>
    <body> 
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";
        $pesquisa = $_GET["nome"];
        $sql = "SELECT `login`, `categoria`, `nome_completo`, `cidade`, `estado`, `pais`, `data_nascimento`, `email`, `tipo` FROM `usuario` WHERE nome_completo = '" . $pesquisa . "'";
        $result = mysqli_query($con, $sql); /* executa a query */
        ?>
        <fieldset>
            <legend><b>Lista de Usuários</b></legend>
            <table class="table table-bordered">
                <tr>
                    <td><b>Nome</b></td>
                    <td><b>Login</b></td>
                    <td><b>Cidade</b></td>
                    <td><b>Estado</b></td>
                    <td><b>País</b></td>
                    <td><b>Nascimento</b></td>
                    <td><b>Email</b></td>
                    <td><b>Tipo</b></td>
                    <td><b>Categoria</b></td>
                </tr>
                <?php
                //Lista dados
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['nome_completo']; ?>
                        </td>
                        <td>
                            <?php echo $row['login']; ?>
                        </td>
                        <td>
                            <?php echo $row['cidade']; ?>
                        </td>
                        <td>
                            <?php echo $row['estado']; ?>
                        </td>
                        <td>
                            <?php echo $row['pais']; ?>
                        </td>
                        <td>
                            <?php 
                                $data = date_create($row['data_nascimento']);
                            echo date_format($data, "d/m/Y"); ?>
                        </td>
                        <td>
                            <?php echo $row['email']; ?>
                        </td>
                        <td>
                            <?php echo $row['tipo']; ?>
                        </td>
                        <td>
                            <?php echo $row['categoria']; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </fieldset>
    </body>
</html>