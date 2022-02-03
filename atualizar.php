<?php
include_once dirname(__FILE__) . "/conexao.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// var_dump($_POST);

// $dados = json_decode(file_get_contents("php://input"), true);
// $id = $dados['id'];
// $email = $dados['email'];
// $nome = $dados['nome'];
// $senha = $dados['senha'];



$sql_atualizar = "UPDATE usuario SET nome = ($nome), email= ($email), senha= ($senha) WHERE ID_USUARIO=($id)";

// sql FUNCIONADO, TESTE
// $sql_atualizar = "UPDATE usuario SET nome = 'teste123', email= 'teste123', senha= 'teste123' WHERE ID_USUARIO=33";

mysqli_query($con, $sql_atualizar) or die(mysqli_connect_error($con));


$response = array("success" => true);
echo json_encode($response);
