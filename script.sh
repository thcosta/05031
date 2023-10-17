#!/usr/bin/env bash

echo 'Movendo AD2 para path padrao do apache...'
sudo cp -r aplicacao /var/www/html/

echo 'Movendo configuração e habilitando site...'
sudo cp aplicacao.conf /etc/apache2/sites-available/ && \
    sudo a2dissite 000-default.conf &&
    sudo a2ensite aplicacao.conf && \
    sudo systemctl reload apache2

echo 'Instalação terminada'
echo 'acesse http://127.0.0.1'