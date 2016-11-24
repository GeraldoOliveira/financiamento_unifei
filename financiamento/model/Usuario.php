<?php

class Usuario {

    public $nome;
    public $login;
    public $senha;
    public $cpf;
    public $pais;
    public $estado;
    public $cidade;
    public $endereco;
    public $nascimento;
    public $email;
    public $tipo;
    public $categoria;
    public $status;

    public function __construct( $nome, $login, $senha, $cpf, $pais, $estado, $cidade, $endereco, $nascimento, $email, $tipo, $categoria, $status) {
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->cpf = $cpf;
        $this->pais = $pais;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->endereco = $endereco;
        $this->nascimento = $nascimento;
        $this->email = $email;
        $this->tipo = $tipo;
        $this->categoria = $categoria;
        $this->status = $status;
    }
    
    public function listarUsuario($nome, $login) {
        $db = mysql_connect("localhost", "root");
        mysql_select_db("financiamento");
        if($nome == "" && $login == ""){
            $sql = "SELECT * FROM usuario ORDERBY nome";
        } else if($nome == ""){
            $sql = "SELECT * FROM usuario WHERE login = '" . $login . "' ORDERBY nome";            
        } else if($login == ""){
            $sql = "SELECT * FROM usuario WHERE nome = '" . $nome . "' ORDERBY nome";
        } else {
            $sql = "SELECT * FROM usuario WHERE nome = '" . $nome . "' AND login = '" . $login . "' ORDERBY nome";
        }
        $result = mysql_query($sql);
        $usuarios = array();
        while($row = mysql_fetch_array($result)){
            $usuarios[] = new Usuario($row['nome'], $row['login'], $row['senha'], $row['cpf'], $row['pais'], $row['estado'], $row['cidade'], $row['endereco'], $row['nascimento'], $row['email'], $row['tipo'], $row['categoria'], $row['status']);
        }
        mysql_close();
        return $usuarios;
    }
    
    public function salvarUsuario() {
        $db = mysql_connect("localhost", "root");
        mysql_select_db("financiamento");
        $sql = "SELECT login FROM usuario WHERE login = '" . $this->login . "'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if($row['login'] != ""){
            return false;
        }
        if ($this->categoria == ""){
            $sql = "INSERT INTO (nome, login, senha, cpf, pais, estado, cidade, endereco, nascimento, email, tipo, categoria, status) VALUES"
                . "('" . $this->nome . "', '". $this->login . "', '" . $this->senha . "', " . $this->cpf . ", '" . $this->pais . "', "
                . "'" . $this->estado . "', '" . $this->cidade . "', '" . $this->endereco . "', '" . $this->nascimento . "', '" . $this->email . "', "
                . "'" . $this->tipo . "', " . null . ", " . true . ")";
        } else { 
            $sql = "INSERT INTO (nome, login, senha, cpf, pais, estado, cidade, endereco, nascimento, email, tipo, categoria, status) VALUES"
                . "('" . $this->nome . "', '". $this->login . "', '" . $this->senha . "', " . $this->cpf . ", '" . $this->pais . "', "
                . "'" . $this->estado . "', '" . $this->cidade . "', '" . $this->endereco . "', '" . $this->nascimento . "', '" . $this->email . "', "
                . "'" . $this->tipo . "', '" . $this->categoria . "', " . true . ")";
        }
        $result = mysql_query($sql);
        mysql_close();
        if($result){
            return true;
        }
        return false;
    }
    
    public function updateUsuario($login) {
        $db = mysql_connect("localhost", "root");
        mysql_select_db("financiamento");
        $sql = "SELECT * FROM usuario WHERE login = '" . $login . "'";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        if($row['login'] == ""){
            return false;
        }
        $sql = "UPDATE usuario SET login = '" . $this->login . "', nome = '" . $this->nome. "'  WHERE login = '" . $login . "'";
        $result = mysql_query($sql);
        mysql_close();
        if($result){
            return true;
        }
        return false;
    }
    
    public function desativarUsuario() {
        $db = mysql_connect("localhost", "root");
        mysql_select_db("financiamento");
        $sql = "UPDATE usuario SET status = " . false . "  WHERE login = '" . $this->login . "'";
        $result = mysql_query($sql);
        mysql_close();
        if($result){
            return true;
        }
        return false;
    }
    
}
?>