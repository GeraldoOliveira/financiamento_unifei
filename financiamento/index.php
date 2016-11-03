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
        <script>
            var cc = 0;
            function confirma_pass() {
                var pass = document.getElementById("pass").value;
                var cpass = document.getElementById("c_pass").value;
                if (pass != cpass) {
                    alert("Senhas não conferem");

                    document.getElementById("pass").focus();

                    //variavel pra ver se já entrou aqui
                    cc = cc + 1;
                }
            }
        </script>
    </head>
    <body>
        <?php
        include "../financiamento/conexao.php";
        include_once 'header.php';
        if (isset($_POST["submit"])) {
            $pesquisa = $_POST["login"];
            $sql = "SELECT nome_completo , senha , status  FROM `usuario` WHERE login = '" . $pesquisa . "'";
            $result = mysqli_query($con, $sql); /* executa a query */
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $status = $row['status'];
            $pass = $_POST["senha"];
            $bdpass = $row['senha'];
            $user = $row['nome_completo'];
            if ($pass == $bdpass && $status == 0) {
                session_start();
                $_SESSION['nome'] = $user;
                $_SESSION['login'] = $pesquisa;
                header("Location:reativa.php");
            } else if ($pass == $bdpass && $status == 1) {
                session_start();
                $_SESSION['nome'] = $user;
                $_SESSION['login'] = $pesquisa;
                header("Location:menu_inicial.php");
            } else {
                ?>
                <div class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h4> Senha ou login incorreto. Tente novamente.</h4><br><br>
                                <div class="row">
                                    <div class="col-md-11">
                                        <a class="btn btn-primary" href="index.php">Voltar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    } else {
        ?>
        <div class="section" style="min-height: 600px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="margin:0">Bem-vindo ao Financiamento Unifei.</h2><br>
                        <div style="font-size: 14"><strong>Por favor, realize o login.</strong></div><br>
                        <div>
                            <form action="index.php" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputCode" class="col-sm-1 control-label">Login</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-group" id="inputCode" name="login" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class= "col-sm-1 control-label">Senha</label>
                                    <div class="col-sm-1">
                                        <input type="password" class="form-group" id ="inputPassword" name="senha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-1 col-sm-10">
                                        <br><button type="submit" name="submit" value="LoginFuncionario" class="btn btn-primary" >Logar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    include_once 'footer.php';
    ?>
</body>
</html>