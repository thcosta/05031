<?php
function calculaNumeroVizinhos($matriz, $_qtd_nos){
  $maior = NULL;
  $quantidade_maior = 0;

  foreach($matriz as $index => $linha){
    $quantidade_linha = 0;
    foreach($linha as $coluna) {
      if($coluna == 1){
        $quantidade_linha += 1;
      }
    }
    if ($quantidade_linha >= $quantidade_maior) {
      $quantidade_maior = $quantidade_linha;
      $maior = $index;
    }
  }
  return $maior;
}

function grafo_push(&$matriz, $vetor) {
  if (sizeof($vetor) != sizeof($matriz[0])) {
    throw new Exception('O número de linhas do vetor deve ser igual ao número de nós da matriz!');
  }
  foreach($matriz as $index => &$linha){
    array_push($linha, $vetor[$index]);
  }
  array_push($vetor, 0);
  array_push($matriz, $vetor);
}

$qtd_nos = readline("Entre com quantidade de nós do grafo: ");
$qtd_nos = intval($qtd_nos);
if(!is_int($qtd_nos) || $qtd_nos == 0) {
  throw new Exception('O número de nós deve ser um número inteiro maior que zero!');
}

$matriz = array();
$qtd_nos_atual = 0;

while($qtd_nos_atual < $qtd_nos) {
  $entrada_linha = readline("Entre com a nova linha da matriz com as colunas separadas por espaço: ");
  $linha = preg_split("/ /", $entrada_linha);
  if (sizeof($linha) != $qtd_nos) {
    echo("O número de colunas deve ser igual a $qtd_nos! Tente novamente...\n");
  }
  else {
    array_push($matriz, $linha);
    $qtd_nos_atual += 1;
  }
}

print_r($matriz);
echo "\n";

$maior_vizinhos = calculaNumeroVizinhos($matriz, $qtd_nos);
echo "O nó com maior número de vizinhos é o: $maior_vizinhos\n";

while(True) {
  $entrada_linha = readline("Entre com o vetor a ser inserido na matriz com as colunas separadas por espaço: ");
  $vetor = preg_split("/ /", $entrada_linha);
  if (sizeof($vetor) != $qtd_nos) {
    echo("O número de colunas deve ser igual a $qtd_nos! Tente novamente...\n");
  }
  else {
    break;
  }
}

grafo_push($matriz, $vetor);

print_r($matriz);
echo "\n";
?>