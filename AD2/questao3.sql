USE `leitos_hospitalares`;

SELECT DISTINCT `hospital`.`nome` AS 'nome_hospital',
                `leito`.`codigo` AS 'codigo_leito',
                `transacao_atual`.`data` AS 'data'
FROM `transacao` AS `transacao_atual`
        INNER JOIN `leito` ON `leito`.`id` = `transacao_atual`.`leito_id`
        INNER JOIN `hospital` ON `hospital`.`id` = `leito`.`hospital_id`
        LEFT JOIN `transacao` AS `transacao_antiga`
                ON `transacao_antiga`.`leito_id` = `leito`.`id`
                    AND `transacao_atual`.id <> `transacao_antiga`.id
WHERE `transacao_atual`.`status` = 'Disponível' AND
    (`transacao_antiga`.id IS NULL OR `transacao_atual`.data > `transacao_antiga`.data);