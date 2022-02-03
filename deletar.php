<?php
include_once dirname(__FILE__) . "/conexao.php";

$id = $_POST['id'];

$sql_deletar = "DELETE FROM usuario WHERE ID_USUARIO=($id)";

mysqli_query($con, $sql_deletar) or die(mysqli_connect_error($con));


$response = array("success" => true);
echo json_encode($response);
