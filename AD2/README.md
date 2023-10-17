# Sobre as questões
1 - As questões 1, 2 e 3 estão no arquivo `sql` com nome correspondente;  
2 - Na questão 4, o arquivo `index.php` está na pasta `questao4/aplicacao`;  
3 - Para executar a questão 4 é preciso ter o Apache e as bibliotecas libapache2-mod-php php-mysql instaladas. Em um ambiente linux, para instalar execute o comando:
```shell
$ sudo apt install apache2 php libapache2-mod-php php-mysql
``` 
4 - Em um ambiente linux, é possível configurar a aplicação da questão 4 rodando o script:
```shell
$ ./configurando.sh
``` 
5 - Para desfazer as configurações realizadas pelo script, basta rodar:
```shell
$ ./desconfigurando.sh
``` 
6 - Na questão 4, a conexão com o banco de dados é feita no host `localhost`, com usuário `root` e senha `admin`, no banco `leitos_hospitalares` criado pelo arquivo `questao1.sql`.

## Rodando o programa
1 - Para rodar o programa da questão 4, digite no browser:
```
http://localhost
```