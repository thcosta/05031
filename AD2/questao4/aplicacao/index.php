<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Thays Costa">
    <title>Leitos Disponíveis</title>
    <style>
      nav {
        text-align: center;
        font-family: times;
        border-bottom: 2px solid grey;
        margin-bottom: 50px;
        padding-bottom: 10px;
      }

      nav h1 {
        font-size: 36px;
      }

      main {
        display: block;
        margin-left: 20px;
        margin-right: 20px;
      }

      .row {
        display: inline-block;
        padding: 2px;
        padding-bottom: 0;
        width: 100%;
        text-align: center;
      }

      .inline-field {
        display: inline-block;
        padding-bottom: 10px;
      }

      .inline-field input {
        margin-left: 20px;
      }

      input[type=text] {
        width: 400px;
      }

      input[type=submit] {
        width: 80px;
      }

      input:focus {
        color: #3fa0e0;
      }

      div.resultado {
        width: 60%;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
      }

      div.resultado p {
        text-align: center;
        font-weight: bold;
      }

      table {
        width: 100%;
      }

      table, th, td {
        border: 1px solid #000000;
      }
      
      th, td {
        padding: 5px 10px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <header>
      <nav>
        <h1>Leitos Disponíveis</h1>
        <h2>Formulário de Busca</h2>
      </nav>
    </header>
      <main>
      <form action="/index.php" method="GET">
        <div class="row">
          <div class="inline-field">
            <input type="text" name="cidade" class="small-field" placeholder="Informe a cidade que deseja realizar a busca...">
            <input type="submit" value="Buscar">
          </div>
        </div>
      </form>
      <?php
        if (isset($_GET['cidade']) and !empty($_GET['cidade'])) {
          $cidade = $_GET['cidade'];
          $cidade = "%$cidade%";
          $link = new mysqli('localhost', 'root', 'admin', 'leitos_hospitalares');
          if ($link->connect_error) {
            die("Parâmetros de conexão inválidos: ".$link->connect_error);
          }
          $stmt = $link->stmt_init();
          if ($stmt->prepare("SELECT COUNT(`leito_id`) AS `quantidade`, `hospital`.`nome` AS `hospital`
                              FROM `hospital`
                                      INNER JOIN `cidade` ON `cidade`. `id` = `hospital`.`cidade_id`
                                      LEFT JOIN (
                                  SELECT DISTINCT  `transacao_atual`.`leito_id` AS `leito_id`,
                                                  `leito`.`hospital_id` AS `hospital_id`
                                  FROM `transacao` AS `transacao_atual`
                                          INNER JOIN `leito` ON `leito`.`id` = `transacao_atual`.`leito_id`
                                          LEFT JOIN `transacao` AS `transacao_antiga`
                                                    ON `transacao_antiga`.`leito_id` = `transacao_atual`.`leito_id`
                                                        AND `transacao_atual`.id <> `transacao_antiga`.id
                                  WHERE `transacao_atual`.`status` = 'Disponível' AND
                                      (`transacao_antiga`.id IS NULL OR `transacao_atual`.data > `transacao_antiga`.data)
                              ) `leitos_disponiveis` ON `leitos_disponiveis`.`hospital_id` = `hospital`.`id`
                              WHERE `cidade`.`nome` LIKE ?
                              GROUP BY `hospital`
                              ORDER BY `quantidade` DESC")) {
            $stmt->bind_param("s", $cidade);
            $stmt->execute() or die('Erro na consulta: '. $stmt->error);
            $result = $stmt->get_result();
            if ($result->num_rows == 0) {
              echo '<div class="resultado"><p>Sem vagas disponíveis!</p></div>';
            } 
            else {
              $table = "<div class='resultado'>
                          <table>
                            <thead>
                              <tr>
                                <th>Nome do Hospital</th>
                                <th>Número de Leitos Disponíveis</th>
                              </tr>
                            </thead>
                            <tbody>";
              while ($row = $result->fetch_assoc()) {
                $hospital = $row['hospital'];
                $quantidade = $row['quantidade'];
                $table .= "<tr>
                          <td>$hospital</td>
                          <td>$quantidade</td>
                        </tr>";
              }
              $table .= "</tbody>
                      </table>
                    </div>";
              $stmt->close();
              echo $table;
            }
          }
        } else {
          echo '<div class="resultado"><p>Digite o nome da cidade!</p></div>';
        }   
      ?>
    </main>
  </body>
</html>