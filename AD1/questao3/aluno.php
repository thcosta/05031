<?php
require "atividade_complementar.php";

class Aluno {
  private $nome;
  private $total_horas_ac;
  private $acs;

  function __construct($nome, $total_horas_ac) {
    $this->set_nome($nome);
    $this->set_total_horas_ac($total_horas_ac);
    $this->acs = array();
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

  public function set_total_horas_ac($total_horas_ac) {
    if(is_int($total_horas_ac)) {
      $this->total_horas_ac = $total_horas_ac;
    }
    else {
      throw new Exception('Formato do total das horas de atividades complementares inválido!');
    }
  }

  public function get_total_horas_ac() { return $this->total_horas_ac; }

  public function adicionar_ac($ac) {
    if($ac instanceof AtividadeComplementar) {
      array_push($this->acs, $ac);
      echo "Atividade complementar adicionada!";
      return true;
    } else {
      echo "Erro! Não é uma atividade complementar!";
      return false;
    }
  }

  public function listar_acs_tipo($tipo) {
    $total_cursado = 0;
    $table = "
    <table style='border: 2px solid #000000'>
      <thead>
        <tr>
          <th>Atividade Complementar</th>
          <th>Horas cursadas</th>
        </tr>
      </thead>
      <tbody>";
    foreach($this->filtrar_ac_por_tipo($tipo) as $ac) {
      $nome = $ac->get_nome();
      $horas = $ac->get_horas();
      $total_cursado += $horas;
      $table .= "
        <tr>
          <td>$nome</td>
          <td>$horas</td>
        </tr>";
    }
    $table .= "
        <tr><td colspan='2'>Total $total_cursado h</tr>
      </tbody>
    </table>";
    echo $table;
  }

  private function filtrar_ac_por_tipo($tipo){
    $acs_do_tipo = array();
    foreach($this->acs as $ac) {
      if ($ac->get_tipo() == $tipo) {
        array_push($acs_do_tipo, $ac);
      }
    }
    return  $acs_do_tipo;
  }

  public function calcular_horas_faltantes_ac(){
    $total_cursado = 0;
    foreach($this->acs as $ac) {
      $total_cursado += $ac->get_horas();
    }
    return $this->total_horas_ac - $total_cursado;
  }
}
?>