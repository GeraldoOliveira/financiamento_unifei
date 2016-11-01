<!DOCTYPE html>
<html>
    <head>
        <title>Financiamento UNIFEI</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php
        include "../financiamento/conexao.php";
        if (isset($_POST["submit"])) {
        $pesquisa = $_POST["login"];
        $sql = "SELECT nome_completo ,`senha` FROM `usuario` WHERE login = '" . $pesquisa . "'";
        $result = mysqli_query($con, $sql); /* executa a query */
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $pass = $_POST["senha"];
        $bdpass = $row['senha'];
        $user = $row['nome_completo'];
        if($pass == $bdpass){
            header("Location:menu_inicial.php")
            ?><h4>Login realizado com sucesso. Seja bem-vindo <?php echo $user; ?>.</h4>
        <?php }else
            ?>  Senha ou login incorreto. Tente novamente.<br><br>
            <a href="index.php">Voltar</a>
                <?php
        
        }else{ ?>
        <h2 style="margin:0">&nbsp;Bem-vindo ao Financiamento Unifei.</h2><br>
        <div style="font-size: 14"><strong> &nbsp;&nbsp;&nbsp;Por favor, realize o login.</strong></div><br>
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
        <?php }     ?>
    </body>
</html>