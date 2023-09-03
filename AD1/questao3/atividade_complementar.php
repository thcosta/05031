<?php
require "ac.php";

class AtividadeComplementar {
  private $nome;
  private $horas;
  private $tipo;


  function __construct($nome, $horas, $tipo) {
    $this->set_nome($nome);
    $this->set_horas($horas);
    $this->set_tipo($tipo);    
  }

  public function set_nome($nome) {
    if(is_string($nome)) {
      $this->nome = $nome;
    }
    else {
      throw new Exception('Formato do nome inválido!');
    }
  }

  public function get_nome() { return $this->nome; }

  public function set_horas($horas) {
    if(is_int($horas)) {
      $this->horas = $horas;
    }
    else {
      throw new Exception('Formato das horas inválido!');
    }
  }

  public function get_horas() { return $this->horas; }

  public function set_tipo($tipo) {
    if(in_array($tipo, AC::tipos_diponiveis())) {
      $this->tipo = $tipo;
    }
    else {
      throw new Exception('Formato do tipo inválido!');
    }
  }

  public function get_tipo() { return $this->tipo; }
}
?>