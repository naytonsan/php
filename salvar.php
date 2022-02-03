<?php
include_once dirname(__FILE__) . "/conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$sql_insert = "INSERT INTO usuario (NOME, EMAIL, SENHA) VALUES ('$nome', '$email', '$senha')";

mysqli_query($con, $sql_insert) or die(mysqli_connect_error($con));


$response = array("success" => true);
echo json_encode($response);
