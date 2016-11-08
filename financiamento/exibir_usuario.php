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
        <title>Exibir Usuário</title>
    </head>
    <body> 
        <?php
        session_start();
        include "../financiamento/conexao.php";
        include_once 'header.php';
        include_once 'menu.php';
        $pesquisa = $_GET["nome"];
        $sql = "SELECT login, categoria, nome_completo, cidade, estado, pais, data_nascimento, email, tipo FROM usuario WHERE nome_completo = '" . $pesquisa . "' AND status = 1 ";
        $result = mysqli_query($con, $sql); /* executa a query */
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
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
                                            echo date_format($data, "d/m/Y");
                                            ?>
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
                    </div>
                </div>
            </div>
        </div>
        <?php
            include_once 'footer.php';
        ?>
    </body>
</html>