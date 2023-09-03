<?php
abstract class AC {
  const Seminario = "Atividade Complementar do Tipo Seminário";
  const ProjetoDePesquisa = "Atividade Complementar do Tipo Projeto de Pesquisa";
  const Publicacao = "Atividade Complementar do Tipo Publicação";

  public static function tipos_diponiveis(){
    return array(self::Seminario, self::ProjetoDePesquisa, self::Publicacao);
  }
}
?>