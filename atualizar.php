<?php

include_once dirname(__FILE__) . "/conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql_atualizar = "UPDATE usuario SET nome = '$nome', email= '$email', senha= '$senha' WHERE ID_USUARIO='$id'";

mysqli_query($con, $sql_atualizar) or die(mysqli_connect_error($con));

// Porque o Atualizar e o Deletar funciona sem os comandos abaixo e o Salvar não ?

// $response =  array("success" => true, 'NOME' => $nome);
// echo json_encode($response);
