## Configuração do Back-end
O back-end foi feito com micro-framework Lumen da Laravel sem nenhum tipo de autenticação. Foi criado somente um CRUD para gerenciamento desse projeto.

Requisitos para colocar o projeto em produção:

* Configure o arquivo `.env` com base no `.env.example`;
* Instale as dependências do composer com: `composer install`;
* Rode a migração do banco para criação da estrutura base: `php artisan migrate`;
* Entre na pasta `/app/public` e suba um servidor local com a porta 8001: 
  * `php -S localhost:8001`

Caso queira executar os testes unitários das funções implementadas:
* `php vendor/phpunit/phpunit/phpunit`


## Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

