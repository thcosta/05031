<?php
include "aluno.php";

echo "Criando aluno ...";
$aluno = new Aluno("Flavio", 300);

$tipo_seminario = AC::Seminario;
$tipo_projeto = AC::ProjetoDePesquisa;
$tipo_publicacao = AC::Publicacao;

echo "\n\nCriando atividade complementar SBSC-2020 ...";
$ac1 = new AtividadeComplementar("SBSC-2020", 8, $tipo_seminario);
echo "\n\nCriando atividade complementar PIBIC-2020 ...";
$ac2 = new AtividadeComplementar("PIBIC-2020", 60, $tipo_projeto);
echo "\n\nCriando atividade complementar SBCAS-2021 ...";
$ac3 = new AtividadeComplementar("SBCAS-2021", 16, $tipo_publicacao);

echo "\n\nAdicionando atividade complementar SBSC-2020 ... ";
$aluno->adicionar_ac($ac1);
echo "\n\nAdicionando atividade complementar PIBIC-2020 ... ";
$aluno->adicionar_ac($ac2);
echo "\n\nAdicionando atividade complementar SBCAS-2021 ... ";;
$aluno->adicionar_ac($ac3);


echo "\n\nListando atividades complementares do tipo Seminário ...";
$aluno->listar_acs_tipo($tipo_seminario);
echo "\n\nListando atividades complementares do tipo Projeto de Pesquisa ...";
$aluno->listar_acs_tipo($tipo_projeto);
echo "\n\nListando atividades complementares do tipo Publicações ...";
$aluno->listar_acs_tipo($tipo_publicacao);

echo "\n\nTotal de horas de atividades complementares remanescentes: ";
echo $aluno->calcular_horas_faltantes_ac();
echo "\n";
?>