<?php
function oculta_cpf($texto){
  return preg_replace("/\d{1,3}\.\d{3}\.\d{3}\/\d{2}/", "xxx", $texto);
}


$texto = readline("Entre com o texto em que deseja ocultar o CPF: ");

echo "O texto transformado é:\n";

$texto_alterado = oculta_cpf($texto);

echo  "$texto_alterado\n";
?>