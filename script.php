<?php

$data = $_POST['data'];


// com esse abaixo eu tive resultado, também
// $teste = json_encode(['dataType' => gettype($data), 'data' => $data], JSON_FORCE_OBJECT);
$teste = json_encode(['dataType' => gettype($data), 'data' => $data]);

print_r($teste);

// como utilizar aqui no php esse print_r($teste) que é exibido no consulo do navagador ??