USE `leitos_hospitalares`;

-- Inserção das Cidades
INSERT INTO `cidade` VALUES (1,'Rio de Janeiro'),
                            (2,'Niterói'),
                            (3,'Nova Friburgo');

-- Inserção das Hospitais
INSERT INTO `hospital` VALUES (1,"Hospital Copa D'Or", 'Rua Figueiredo de Magalhães, 875 - Térreo - Copacabana', 1),
                              (2,"Hospital Niterói D'Or", 'Rua Mariz e Barros, 550 - Icaraí', 2);

-- Inserção das Leitos
INSERT INTO `leito` VALUES  (1,'LC001', 1),
                            (2,'LC002', 1),
                            (3,'LC003', 1),
                            (4,'LC004', 1),
                            (5,'LC005', 1),
                            (6,'LN001', 2),
                            (7,'LN002', 2),
                            (8,'LN003', 2);


-- Inserção das Pacientes
INSERT INTO `paciente` VALUES (1, "Ana Silva", "10009876"),
                              (2, "Maria Rodrigues", "10008765"),
                              (3, "José Santos", NULL),
                              (4, "Carlos Oliveira", "10005678"),
                              (5, "Pedro Souza", "10006789");

-- Inserção das Transações
INSERT INTO `transacao` VALUES  (1, 1, NULL, 'Disponível', '2023-10-16 08:00:00'),
                                (2, 2, NULL, 'Disponível', '2023-10-16 08:10:00'),
                                (3, 3, NULL, 'Disponível', '2023-10-16 08:20:00'),
                                (4, 4, NULL, 'Disponível', '2023-10-16 08:30:00'),
                                (5, 5, NULL, 'Disponível', '2023-10-16 08:40:00'),
                                (6, 6, NULL, 'Disponível', '2023-10-16 08:50:00'),
                                (7, 7, NULL, 'Disponível', '2023-10-16 09:00:00'),
                                (8, 8, NULL, 'Disponível', '2023-10-16 09:10:00'),
                                (9, 1, NULL, 'Limpeza', '2023-10-17 08:00:00'),
                                (10, 2, 1, 'Ocupado', '2023-10-17 08:10:00'),
                                (11, 3, 2, 'Ocupado', '2023-10-17 08:20:00'),
                                (12, 4, 3, 'Reservado', '2023-10-17 08:30:00'),
                                (13, 5, 4, 'Reservado', '2023-10-17 08:40:00');
