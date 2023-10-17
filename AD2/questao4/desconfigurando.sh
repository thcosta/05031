#!/usr/bin/env bash

echo 'Removendo pasta aplicação do path padrão do apache...'
sudo rm -r /var/www/html/aplicacao

echo "Removendo configuração e desabilitando o site no apache..."
sudo a2dissite aplicacao.conf &&
     sudo a2ensite 000-default.conf && \
     sudo rm /etc/apache2/sites-available/aplicacao.conf && \
     sudo systemctl reload apache2

echo 'Desinstalação terminada'