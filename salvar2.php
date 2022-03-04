<?php
// não precisou do comando abaixo
// header('content-type: application/json');

include_once dirname(__FILE__) . "/conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql_insert = "INSERT INTO usuario (NOME, EMAIL, SENHA) VALUES ('$nome', '$email', '$senha')";

mysqli_query($con, $sql_insert) or die(mysqli_connect_error($con));

// não sei pra que isso abaixo, só sei se retirar a pagina não atualiza automaticamente
// Porque o Atualizar e o Deletar funciona sem os comandos abaixo e o Salvar não ?
$response = array("success" => true);
echo json_encode($response);
