# Comunidade CakePHP Brasil

## Para adicionar um link

Vá até o [formulário de cadastro](http://www.cakephpbrasil.com.br/admin/add) e envie seu link, ele precisa ser aprovado antes de aparecer na página inicial.

[Clique aqui para cadastrar um artigo](http://www.cakephpbrasil.com.br/admin/add).

## Para ajudar com correções

Você vai precisar do NPM e Bower instalados, após isso rode os comandos a seguir:

	npm install
	bower install

No final você deverá acabar com dois novos diretórios, `node_modules` e `resources`, você vai usar o `resources`

Dentro do diretório `resources` temos o diretório `my`, dentro dele estão os arquivos originais de Javascript e Sass.

Após editar os arquivos você deverá gerar os novos css e js minificados com o comando a seguir:

	gulp --production

Para manter o Gulp aguardando suas alterações (em vez de digital o comando acima toda hora), basta fazer isso:

	gulp watch --production

O site está dentro do diretório public, você deve acessa-lo no navegador ou apontar o servidor para ele, não é possível ver a aplicação sem um servidor HTTP.

## Servidor

Para deixar o servidor funcional você precisa:

Renomear o arquivo `.env.example` para `.env` e editar os dados de acesso ao banco de dados dentro dele.

Criar um banco de dados e rodar o arquivo `dump.sql` para criar as tabelas.

Instale as dependências com o `composer install`

Para iniciar o servidor embutido do PHP rode o comando a baixo:

	php server.php

Dentro do diretório `server`.

Prontinho!