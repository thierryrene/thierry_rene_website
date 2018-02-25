<?php

$data_hoje = date('d-m-Y');

$data_inicio = '22/02/2018';

$data_fim = '28/08/2018';

if ( ($data_inicio <= $data_hoje) && ($data_hoje <= $data_fim) ) {
  echo "ta dentro do tempo";
} else {
  echo "fora do range";
}

die();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
</head>
<body>





</body>

</html>