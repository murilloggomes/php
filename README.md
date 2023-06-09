<h1>PROVA TESTE PHP - ARQMED - PHP 8.2</h1> 

<p align="center">
  <img src="http://img.shields.io/static/v1?label=License&message=MIT&color=green&style=for-the-badge"/>
   <img src="http://img.shields.io/static/v1?label=STATUS&message=Desenvolvimento&color=GREY&style=for-the-badge"/>
</p>

-> Status do Projeto: Desenvolvimento

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Deploy da Aplicação](#deploy-da-aplicação-dash)

:small_blue_diamond: [Pré-requisitos](#pré-requisitos)

:small_blue_diamond: [Como rodar a aplicação](#como-rodar-a-aplicação-arrow_forward)

## Descrição do projeto 

<p align="justify">
  Sistema de desenvolvido com um um MVC EXCLÚSIVO DESENVOLVIDO PELO CANDIDATO MURILLO GOMES, podendo agragar bastante em vários projetso dentro da arqmed. Se utilizando de PHP 8.2, e uma arquitetura, foi utilizado de algums packages para auxiliar o desenvolvimento ágil do sistema.

  Os ambientes de utulização foram xampp na versão mais recente 8.2, junto com MYSQL e unicamente só, todo o resto já estará disponível dentro do projeto para os avaliados.  
</p>

## Funcionalidades

:heavy_check_mark: Página Externa para acesso ao cliente (Site institucional, e-commerce, vai da ideia da projeto).  

:heavy_check_mark: Dashboard interno já estruturado para você escalar mediante suas nececidades, com uma arquitetura MVC basta você se preocupar em Controller, Views, Moldes e Rotas e seu sistema sempre estará 100%! No caso caso temos 3 páginas, Produtos, Categorias e LOGS para ficar captando as ações dos usuários que foram mexendo.

:heavy_check_mark: Responsivo para todo o tipo de tela, e também nas proporções corretas para se fazer um webviews mobile dele.  

:8

## Pré-requisitos

:warning: [PHP ^8.1.1](https://php.net/) 
:warning: [Maria DB 10.3.35](https://mariadb.org/)

No terminal, clone o projeto: 

```
sudo git clone git@github.com:murilloggomes/noodle-open-source-framework-php-82.git
```

run: "cd" no caminho da pasta do projeto (que deve ser baixa na pasta raiz realmente da aplicação)

## Como rodar os testes
```
sudo nano /app/config/database.config.php;
```
```
define("DB_HOST", "localhost");
define("DB_NAME", "nome_banco"); // Coloque o nome do seu banco
define("DB_USER", "usuario_banco"); // Coloque o nome do seu usuário
define("DB_PASS", "senha_banco"); // Coloque a senha do seu usuário do Banco
define("DB_ENCODING", "utf8");
```

Após isso você vai acessar a basta 

/database/ -> lera estará contido tanto um backup do meu banco de ambiente de teste, quantos as querys para que vocês consigam rodam as migrations de vocês!

## Casos de Uso

Depois disso pode ir direto pro login e acessar com o usuário e senha que você cadastrou ou rodar o script sql:

Caso estejam com problema de acesso segue meu usuário para teste:

Usuário: murilloggomes@gmail.com
Senha: renael132


## Contribuições

[Buy Me A Coffee](https://www.buymeacoffee.com/murilloggo)
