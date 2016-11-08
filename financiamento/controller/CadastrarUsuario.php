<?php

include_once("../model/Usuario.php");

class CadastrarUsuario {

    public $novoUsuario;

    public function __construct() {
        $this->novoUsuario = new CadastrarUsuario();
    }

    public function invoke() {

        // Pegar os campos do formulario de cadastro de usuario
        $login = $_POST["login"];
        $senha = $_POST["senha"];
        $nome = $_POST["login"];
        $login = $_POST["login"];
        $senha = $_POST["login"];
        $cpf = $_POST["login"];
        $pais = $_POST["login"];
        $estado = $_POST["login"];
        $cidade = $_POST["login"];
        $endereco = $_POST["login"];
        $nascimento = $_POST["login"];
        $email = $_POST["login"];
        $tipo = $_POST["login"];
        $categoria = $_POST["login"];

        // Criar o Model
        $this->novoUsuario = new Usuario($nome, $login, $senha, $cpf, $pais, $estado, $cidade, $endereco, $nascimento, $email, $tipo, $categoria, 1);

// Persstir usuario no banco
        if ($this->novoUsuario->salvarUsuario()) {
            header("Location:../view/#"); // usuario cadastrado com sucesso
        } else {
            header("Location:../view/erro.php?erro=Usuário não cadastrado. Tente novamente.");
        }
    }

}

?>