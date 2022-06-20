# API de Exemplo

API de exemplo usando o Lumen 8x com todas as endpoints protegidas com autenticação. Trata-se de um pequeno sistema de
gerenciamento de contas domésticas. Novas funcionalidades serão implementadas em breve.

# Requisitos

1) Servidor HTTP `Apache` ou `Nginx`;
2) Reescrita de URL habilitada;
3) Servidor PHP na versão >= 7.3 com extensões `OpenSSL`, `PDO` e `Mbstring`;
4) Servidor MySQL na versão >= 5.3.

# Instalação

1) Baixe o projeto e acesse o diretório raiz dele via linha de comando. Em seguida execute o comando abaixo para o
composer instalar todas as dependências necessárias;

```
composer install
```
2) Em seguida, crie um banco de dados sem nenhuma tabela em um servidor MySQL;

3) Crie um arquivo com o nome `.env`, copie e cole nele o conteúdo do arquivo `.env.example`;

4) Nas linhas:

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
Substitua os valores das variáveis pelas credenciais e configurações do seu banco de dados e servidor MySQL;

5) Gere uma chave de API para a aplicação. Pode ser uma string aleatória de no mínimo 32 caracteres e converta-a
para base64;

6) Copie essa string e utilize-a como valor para a variável `APP_KEY` no arquivo `.env`;

7) Rode o comando abaixo para inserir as 3 tabelas utilizadas para as operações dos endpoints.

```
php artisan migrate
```

# Execução

Na linha de comando, no diretório raiz do projeto, execute o comando abaixo para ligar o servidor PHP para que este rode a API
no link e porta especificado. Você pode mudar o número da porta se quiser. Caso ela esteja ocupada, o PHP tentará
usar a mais próxima. O link (ou IP se desejar) também pode ser mudado desde que o link ou IP especificado estejam devidamente configurados no seu Virtualhost

```
php -S localhost:8000 -t public
```

# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
