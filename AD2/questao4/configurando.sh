#!/usr/bin/env bash

echo 'Movendo a pasta aplicação para path padrão do apache...'
sudo mkdir -p /var/www/html/aplicacao
sudo cp -r AD2/questao4/aplicacao /var/www/html/

echo 'Movendo configuração e habilitando site...'
sudo cp AD2/questao4/aplicacao.conf /etc/apache2/sites-available/ && \
    sudo a2dissite 000-default.conf &&
    sudo a2ensite aplicacao.conf && \
    sudo systemctl reload apache2

echo 'Instalação terminada'
echo 'acesse http://127.0.0.1'