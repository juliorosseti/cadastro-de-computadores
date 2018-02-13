## Objetivo
O objetivo desse repositório é ligar uma camada front-end com uma camada back-end. 

O projeto deve adicionar e listar computadores em tela vinculando o mesmo a uma área/categoria específica.

## Configuração do Back-end
O back-end foi feito com micro-framework Lumen da Laravel sem nenhum tipo de autenticação. Foi criado somente um CRUD para gerenciamento desse projeto.

Requisitos para colocar o projeto em produção:

* Configurar o arquivo `.env` com base no `.env.example`;
* Rodar a migração do banco para criação da estrutura base `php artisan migrate`;
* Instale as dependencias com composer `composer install`;
* Entre na pasta `/app/public` e suba um servidor local com a porta 8001: 
  * `php -S localhost:8001`

Caso queira executar os testes unitários das funções implementadas:
* `php vendor/phpunit/phpunit/phpunit`


## Configuração do Front-end (jQuery/Gulp)
* Entrar na pasta e baixar as dependências de front-end com `npm install`;
* Após isso, rodar o comando `gulp` para criar um build na pasta `dist`;
* Você vai conseguir acessar o projeto através de um servidor php em `http://localhost/cadastro-de-computadores/frontend/dist/`.


