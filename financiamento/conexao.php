<?php
// Caminho do Mysql
$caminho='localhost';
 
// Usuario de Acesso ao Mysql
$usuario='root';
 
// Senha de Acesso do Mysql
$senha=''; 
 
// Nome do Banco
$banco='financiamento';
 
// Estabelece  a Conexao com o Mysql
$con = mysqli_connect($caminho, $usuario, $senha, $banco) or die ("Não foi possível se conectar ao Banco de Dados!");
 
// Seleciona a Base de Dados
mysqli_select_db($con, $banco);
 
// Tratamento UTF-8 do MYSQL
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, 'SET character_set_connection=utf8');
mysqli_query($con, 'SET character_set_client=utf8');
mysqli_query($con, 'SET character_set_results=utf8');
